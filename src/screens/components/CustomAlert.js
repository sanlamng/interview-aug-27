import React, { Component, useState, useEffect } from 'react';
import { View, Text, StyleSheet, Dimensions, StatusBar, TouchableOpacity } from 'react-native';
import { Colors } from '../../constants/Colors';

const {width, height} = Dimensions.get('window');
const STATUSBAR_HEIGHT = StatusBar.currentHeight;

const CustomAlert = (props) => {
    // const [isShowing, setIsShowing] = useState(false)

    // useEffect(() => {
    //     setIsShowing(props.show)
    // }, [props.show])
    

//  useEffect(() => {
//     setTimeout(() => {
//       setIsShowing(false)
//     }, 5000);
//   }, [isShowing])



    
    return (
        (props.show)?
        <View style={[styles.alert_container, (props.type == 'error')? {backgroundColor:Colors.red}:{backgroundColor:Colors.green}]}>
            <Text style={styles.alert_text }>{props.message}</Text>
            <View style={[styles.button_wrapper, (props.type == 'error')? {backgroundColor:Colors.darkred}:{backgroundColor:Colors.darkgreen}]}>
                <TouchableOpacity onPress={()=> props.onConfirmPressed()}>
                    <Text style={styles.button_btn}>{props.buttonTitle}</Text>
                </TouchableOpacity>
            </View>
        </View>
        :null
    );
};


const styles = StyleSheet.create({
    alert_container: {
       width: '100%',
       top: 0,
       position: 'absolute',
       minHeight: 100,
       zIndex: 50,
       paddingTop: Platform.OS =='ios'?STATUSBAR_HEIGHT+50: STATUSBAR_HEIGHT+10,
       alignItems: 'center',
    },
    alert_text:{
        color: Colors.white,
        textAlign: 'center',
        fontSize: 14,
        lineHeight: 18,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        maxWidth: '80%',
    },
    button_wrapper:{
        width: '90%',
        paddingVertical: 10,
        borderRadius: 8,
        overflow: 'hidden',
        marginVertical: 15,
    },
    button_btn:{
        color: Colors.white,
        textAlign: 'center',
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '500',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    }
});


export default CustomAlert;
