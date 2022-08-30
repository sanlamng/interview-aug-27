import React, { Component, useState, useEffect } from 'react';
import { View,  RefreshControl , PermissionsAndroid, Text, StyleSheet, Dimensions, StatusBar, ScrollView , TextInput, Pressable, Image, TouchableOpacity, Platform} from 'react-native';
import styles from './styles';
import { Colors } from '../../constants/Colors';
import { CustomeStatusBar } from '../../constants/CustomeStatusBar';
import { BaseUrl } from '../../constants/BaseUrl';
import AsyncStorage from '@react-native-async-storage/async-storage';
import NumberFormat from 'react-number-format';


const Dashboard = ({navigation}) => {

    const {width, height} = Dimensions.get('window');

    const [userData, setUserDataIndex] = useState([]);

     function handleCheckUserData(){
        fetch(`http://localhost:8000/api/user`, {
          method: 'GET', 
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
          },
         })
        .then((response) => response.json())
        .then((responseJSON) => {
           if(responseJSON.status == true && responseJSON.statusCode == 200){
              setUserDataIndex(responseJSON.data);
              console.log(responseJSON);
           }else{
              //console.log(responseJSON);
           }
           
        }).catch((error) => {
           console.log(error);  
        })  
      }

      useEffect(() => {
        handleCheckUserData()

      }, [])
      

    const [isLoading, setisLoading] = useState(true);
    const [nosite, setNoSite] = useState(false);
    const [notransaction, setNoTransaction] = useState(false);
      useEffect(
        () => {
          let timer1 = setTimeout(() => setisLoading(false), 3000);
          return () => {
            clearTimeout(timer1);
          };
        },
        []
      );
      function handleStats(){
          navigation.navigate('StatsOne')
      }


     const [isMoneyVisible, setisMoneyVisible] = useState(true)
     function toggleMenu(){
         setisMoneyVisible(!isMoneyVisible)
     }


 
    return (
           
            <View style={{backgroundColor: Colors.background, }}>          
                 <CustomeStatusBar 
                        backgroundColor={Colors.background}
                        barStyle={'dark-content'}
                        />
                    <View style={[styles.dashboard_wrapper]}
                      
                    >

                   <ScrollView 
                     style={styles.dashboard_main_wrapper}
                     showsVerticalScrollIndicator ={false}
                     showsHorizontalScrollIndicator={false}>
                    <View style={styles.account_details}>
                        <Text style={styles.account_details_header}>Name</Text>
                        <Text style={styles.account_details_text}>{userData.name}</Text>
                    </View>

                    <View style={styles.account_details}>
                        <Text style={styles.account_details_header}>Email</Text>
                        <Text style={styles.account_details_text}>{userData.email}</Text>
                    </View>


                    <View style={styles.account_details}>
                        <Text style={styles.account_details_header}>Telephone Number</Text>
                        <Text style={styles.account_details_text}>{userData.telephone}</Text>
                    </View>
                     <View style={styles.dashboard_wrapper_top}>
                        
                        <View style={styles.balance_wrapper}>
                            <Pressable style={styles.balance_top} >
                                <Text style={styles.balance_top_a}>Account balance </Text>
                                
                            </Pressable>
                            <View style={styles.balance_middle}>
                                <View style={styles.balance_middle_a}>
                                   <Image source={require('../../assets/images/balance1.png')} style={styles.balance_middle_a_img} resizeMode='contain'/>
                                </View>
                                <Pressable style={styles.balance_middle_balance} >
                           
                              
                                <NumberFormat value={parseFloat(userData.amountpaid).toFixed(2)} displayType={'text'} thousandSeparator={true} prefix={'N'}
                                     renderText={(value, props) => <Text style={styles.balance_middle_b} {...props}>{value}</Text>} />
                                
                               
                                </Pressable>
                                <Pressable  style={styles.balance_middle_d_wrap}>
                                     <Image source={require('../../assets/images/balance2.png')} style={styles.balance_middle_d} resizeMode='contain'/>
                                </Pressable>
                            </View>
                            <View style={styles.balance_bottom}>
                         
                                <Text style={styles.balance_bottom_a}>N0.00</Text>
                            
                            
                                <Pressable >
                                  <Text style={styles.balance_bottom_b}>transaction today </Text>
                                </Pressable>
                                
                            </View>
                        </View>


                        <View style={styles.action_wrapper}>
                            <TouchableOpacity style={styles.action_box} >
                                <View style={styles.action_box_image_wrap}>
                                   <Image source={require('../../assets/images/scan.png')} style={styles.action_box_image} resizeMode='contain'/>
                                </View>
                                <Text style={styles.action_box_text}>Scan</Text>
                            </TouchableOpacity>

                            <Pressable style={styles.action_box} >
                                <View style={styles.action_box_image_wrap}>
                                   <Image source={require('../../assets/images/deposit.png')} style={styles.action_box_image} resizeMode='contain'/>
                                </View>
                                <Text style={styles.action_box_text}>Deposit</Text>
                            </Pressable>

                            <Pressable style={styles.action_box} >
                                <View style={styles.action_box_image_wrap}>
                                   <Image source={require('../../assets/images/withdraw.png')} style={styles.action_box_image} resizeMode='contain'/>
                                </View>
                                <Text style={styles.action_box_text}>Withdraw</Text>
                            </Pressable>

                            

                            <Pressable style={styles.action_box} >
                                <View style={styles.action_box_image_wrap}>
                                   <Image source={require('../../assets/images/send.png')} style={styles.action_box_image} resizeMode='contain'/>
                                </View>
                                <Text style={styles.action_box_text}>Send</Text>
                            </Pressable>
                        </View>
                    </View>   
                        


                        <View style={styles.trans_wrapper}>
                            <TouchableOpacity style={styles.trans_header}>
                                <Text style={styles.trans_header_text}>Transactions</Text>
                               
                            </TouchableOpacity>

                            <View style={[styles.trans_bottom, {paddingBottom: 100}]}>
                                
                               <View style={styles.transaction_box_wrap}>
                                    {/* <Text style={styles.transaction_box_header}>Today</Text> */}
                                   

                                    <View style={styles.transaction_box_box}>
                                        <View style={styles.transaction_box_left_wrap}>
                                            <Image source={require('../../assets/images/user.png')} style={styles.transaction_box_box_img} resizeMode='contain'/>
                                            <View style={styles.transaction_box_left}>
                                                <Text style={styles.transaction_box_left_a}>FBNInsurance</Text>
                                                <Text style={styles.transaction_box_left_b}>Withdrawal</Text>
                                            </View>
                                        </View>
                                        <View style={styles.transaction_box_right}>
                                            <Text style={styles.transaction_box_right_a}>-N11,257</Text>
                                            <Text style={styles.transaction_box_right_b}>08:27 AM</Text>
                                        </View>
                                    </View>


                                    <View style={styles.transaction_box_box}>
                                        <View style={styles.transaction_box_left_wrap}>
                                            <Image source={require('../../assets/images/user.png')} style={styles.transaction_box_box_img} resizeMode='contain'/>
                                            <View style={styles.transaction_box_left}>
                                                <Text style={styles.transaction_box_left_a}>From FBNInsurance</Text>
                                                <Text style={styles.transaction_box_left_b}>Withdrawal</Text>
                                            </View>
                                        </View>
                                        <View style={styles.transaction_box_right}>
                                            <Text style={styles.transaction_box_right_a}>-N13,997</Text>
                                            <Text style={styles.transaction_box_right_b}>08:27 AM</Text>
                                        </View>
                                    </View>


                                    <View style={styles.transaction_box_box}>
                                        <View style={styles.transaction_box_left_wrap}>
                                            <Image source={require('../../assets/images/user.png')} style={styles.transaction_box_box_img} resizeMode='contain'/>
                                            <View style={styles.transaction_box_left}>
                                                <Text style={styles.transaction_box_left_a}>From Savings</Text>
                                                <Text style={styles.transaction_box_left_b}>Withdrawal</Text>
                                            </View>
                                        </View>
                                        <View style={styles.transaction_box_right}>
                                            <Text style={styles.transaction_box_right_a}>-N6,907</Text>
                                            <Text style={styles.transaction_box_right_b}>08:27 AM</Text>
                                        </View>
                                    </View>


                                    <View style={styles.transaction_box_box}>
                                        <View style={styles.transaction_box_left_wrap}>
                                            <Image source={require('../../assets/images/bank2.png')} style={styles.transaction_box_box_img} resizeMode='contain'/>
                                            <View style={styles.transaction_box_left}>
                                                <Text style={styles.transaction_box_left_a}>Tunde Olaoye</Text>
                                                <Text style={styles.transaction_box_left_b}>Deposit</Text>
                                            </View>
                                        </View>
                                        <View style={styles.transaction_box_right}>
                                            <Text style={styles.transaction_box_right_a}>-N4,257</Text>
                                            <Text style={styles.transaction_box_right_b}>03:27 AM</Text>
                                        </View>
                                    </View>
                               </View>


                              
                            </View>

                            <View style={[styles.dashboard_more_logout,{marginBottom: 100,}]}>
                               <Pressable onPress={() => navigation.navigate('Login')}>
                                  <Text style={styles.dashboard_more_logout_text}>Logout</Text>
                               </Pressable>
                            </View>
                         
                        </View>



                    </ScrollView>

                    </View>





            </View>
       
    );

    
};


export default Dashboard;
