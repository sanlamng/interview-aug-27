import React, { Component, useState,useEffect } from 'react';
import { View, Text, StyleSheet, SafeAreaView, StatusBar, ScrollView , TextInput, Pressable, Image, TouchableOpacity, ActivityIndicator} from 'react-native';
import styles from '../styles';
import { Colors } from '../../constants/Colors';
import CustomAlert from '../components/CustomAlert'
//import { Icon, Switch } from 'react-native-elements';
import { CustomeStatusBar } from '../../constants/CustomeStatusBar';
import { BaseUrl } from '../../constants/BaseUrl';
import AsyncStorage from '@react-native-async-storage/async-storage';
import ReactNativeBiometrics, { BiometryTypes } from 'react-native-biometrics'




const Login = ({navigation}) => {

    const rnBiometrics = new ReactNativeBiometrics()
   function  handleFingerprintAuth(){
        rnBiometrics.isSensorAvailable()
        .then((resultObject) => {
            const { available, biometryType } = resultObject

            if (available && biometryType === BiometryTypes.TouchID) {
                setAlertTitle('TouchID')
                setAlertMessage('TouchID is supported');
                setShowAlert(true)
                navigation.navigate('Dashboard');
            } else if (available && biometryType === BiometryTypes.Biometrics) {
                setAlertTitle('Biometrics')
                setAlertMessage('Biometrics is supported')
                setShowAlert(true)
                navigation.navigate('Dashboard');
            } else {
                setAlertTitle2('Biometrics Error')
                setAlertMessage2('Biometrics is not supported')
                setShowAlert2(true)
            }
        })
    }

    const [checked, setChecked] = useState(false);
    function handleSetCheck(){
        setChecked(!checked);
    }
    const [passwordShown, setPasswordShown] = useState(true);

    function  handlePasswordToggle(){
      setPasswordShown(!passwordShown)
    }

    const [isActiveOne, setActiveOne] = useState(false);
    const [isActiveTwo, setActiveTwo] = useState(false);

    const [email, setEmail] = useState('');
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
 
     const onChangeHandler = (name, value) => {
       if(name=="password"){
         setPassword(value)
       }else if (name=="email") {
         setEmail(value);
       }else if (name=="username") {
         setUsername(value)
       }
      }


    

    const [showAlert, setShowAlert] = useState(false);
    const [alertTitle, setAlertTitle] = useState('');
    const [alertMessage, setAlertMessage] = useState('');


    const [showAlert2, setShowAlert2] = useState(false);
    const [alertTitle2, setAlertTitle2] = useState('');
    const [alertMessage2, setAlertMessage2] = useState('');
  

    const [isLoading, setIsLoading] = useState(false);



    function handleLogin(){
        setIsLoading(true);
        const data = { 
            "username": username,
            "password": password,

        };
        fetch(`http://localhost:8000/api/login`, {
            method: 'POST', 
            headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
           })
          .then((response) => response.json())
          .then((responseJSON) => {
             console.log(responseJSON);
             setIsLoading(false);
             if(responseJSON.statusCode == 200){
                 const jwt = responseJSON.jwt;
                 saveUserAuth(responseJSON.jwt);
                 setAlertTitle('Login Success')
                 setAlertMessage('You have logged in successfully')
                 setShowAlert(true)
             }else{
              setAlertTitle2('Account Error')
              setAlertMessage2('Invalid login details')
              setShowAlert2(true)
             }
             
          }).catch((error) => {
             setIsLoading(false);
             console.log(error);
             
          }) 
    }


      async function saveUserAuth(a) {
        try {
            await AsyncStorage.setItem('UserJWTAysnc', JSON.stringify(a));
            navigation.navigate('Dashboard');
        } catch (error) {
            console.log(error);
        }
      }


     
      useEffect(() => {
        if(!showAlert){
            return
        }
      setTimeout(() => {
          setShowAlert(false)
      }, 5000);
    }, [showAlert])
    return (
       
        <View style={styles.page_container}>
                  
        <CustomeStatusBar 
            backgroundColor={'transparent'}
            barStyle={'dark-content'}
          />
        <View style={styles.page_wrapper}>
                    <ScrollView style={styles.page_wrapper_top}>
                    {/* <AuthHeader goback={()=> navigation.goBack()} /> */}
                    
                    <Text style={styles.page_title}>Welcome back</Text>

                        <View style={styles.form_group}>
                            <Text style={styles.form_label}>Enter your Username</Text>
                           

                         <View style={(isActiveOne)?styles.input_group_focus:styles.input_group}>
                            
                               
                              <TextInput 
                                placeholder='Username'
                            
                                placeholderTextColor={Colors.placeholder}
                                value={username}
                                onChangeText={(value)=>onChangeHandler('username',value)}
                                onFocus={() => setActiveOne(true)}
                                onBlur={() => setActiveOne(false)}
                                style={styles.form_input_type_1_group}
                            />
                            </View>
                        </View>
                         {/* <Pressable onPress={()=> navigation.navigate('SecureTag')}>
                           <Text style={styles.use_email}>Use Email Address Instead</Text>
                        </Pressable>  */}
                        <View style={styles.form_group}>
                            <Text style={styles.form_label}>Enter your password</Text>
                            <View style={(isActiveTwo)?styles.form_input_focus_2_wrap:styles.form_input_type_2_wrap}>
                                <TextInput 
                                    style={styles.form_input_type_2}
                                    placeholder='Enter Password'
                                    secureTextEntry={passwordShown}
                                    placeholderTextColor={Colors.placeholder}
                                    value={password}
                                    onChangeText={(value)=>onChangeHandler('password',value)}
                                    onFocus={() => setActiveTwo(true)}
                                    onBlur={() => setActiveTwo(false)}
                                />
                                <View style={styles.form_input_type_2_icon}>
                                    {/* <Icon
                                        name={(passwordShown)?'eye':'eye-off'}
                                        type='feather'
                                        color='#111827'
                                        onPress={() => handlePasswordToggle()} /> */}
                                </View>
                            </View>

                            <TouchableOpacity>
                               <Text style={styles.forgot_pass_link}>Forgot password?</Text>
                            </TouchableOpacity>
                            
                        </View>

                        
                        <View style={[styles.signin_container, {marginTop: 20}]}>
                            <Text style={styles.signin_title}>Other sign-in options</Text>
                            <View style={styles.signin_wrapper}>
                                 <Pressable onPress={()=> handleFingerprintAuth()}>
                                   <Text style={styles.signin_label}>Use Fingerprint?</Text>
                                 </Pressable>
                            </View>

                         
                        </View>
                    </ScrollView>
                    <View style={styles.page_wrapper_bottom}>
                    <View style={styles.page_wrapper_bottom_signin}>
                        <View style={styles.btn_container}>
                            {(username != '' && password !='')?
                            (!isLoading)?
                            <TouchableOpacity style={styles.btn_wrapper} onPress={()=> handleLogin()}>
                                 <Text style={styles.btn_text}>Sign In</Text>
                             </TouchableOpacity>
                             :
                            <TouchableOpacity style={styles.btn_wrapper2} >
                                 {/* <Text style={styles.btn_text}>Verifying</Text> */}
                                 <ActivityIndicator size="small" color="#ffffff" style={{marginLeft:0}} />
                             </TouchableOpacity>
                             :
                              <TouchableOpacity style={styles.btn_wrapper2} >
                                  <Text style={styles.btn_text}>Sign In</Text>
                              </TouchableOpacity>
                            }
                            
                        </View>
                       
                    </View>
                    </View>
                </View>
            
                <CustomAlert 
                      show={showAlert} 
                      message={alertMessage} 
                      buttonTitle='Close'
                      onConfirmPressed={() => {
                         setShowAlert(false)
                        }} 
                      type='success'
                      
                    /> 

                  <CustomAlert 
                      show={showAlert2} 
                      message={alertMessage2} 
                      buttonTitle='Close'
                      onConfirmPressed={() => {
                         setShowAlert2(false)
                        }} 
                      type='error'
                      
                    /> 

            </View>
    );
};


export default Login;
