import {StyleSheet, Dimensions, StatusBar, Platform } from 'react-native';
import { Colors } from '../../constants/Colors';
const {width, height} = Dimensions.get('window');
const STATUSBAR_HEIGHT = StatusBar.currentHeight;


export default  styles = StyleSheet.create({
    statusBar: {
        height: STATUSBAR_HEIGHT,
      },
      statusBar2: {
        height: 0
      },
      appBar: {
        backgroundColor:'#79B45D',
        height: STATUSBAR_HEIGHT -50,
     },
     keyboard_wrap:{
        width,
        marginTop: 0,
        margin: 0,
        padding: 0,
      },
      keyboard_wrap2:{
       width: '100%',
       marginTop: height/10,
     },
     keyboard_row:{
         width,
         margin: 0,
         padding: 0,
         marginLeft: -20
     },
      keyboard_key:{
       backgroundColor: '#F9FAFB',
       marginRight: 20,
       
       fontWeight: '600',
       fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
       borderRadius: 8,
       overflow: 'hidden'
      },

      keyboard_key_text:{
        fontWeight: '500',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        borderRadius: 8,
        color: '#191A1C',
        fontSize: 20,
        paddingVertical: 10,
        paddingHorizontal: 0,
        overflow: 'hidden'
       },
      alert_overlay:{
         backgroundColor: '#062638',
         opacity: 0.1,
      },
      alert_content_container:{
          width: width,
          backgroundColor: Colors.background,
          borderRadius: 12,
          overflow: 'hidden',
      },
      alert_message:{
        width: '80%',
        color: Colors.black,
        maxWidth: '80%',
        fontSize: 14,
        lineHeight: 18,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        textAlign: 'center',
        marginVertical: 6,
      },
      alert_button:{
          width: width/1.6,
          paddingVertical: 14,
          flexDirection: 'row',
          justifyContent: 'center'
      },
      alert_button_text:{
        color: Colors.white,
        maxWidth: '80%',
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
      },
    logo_wrapper:{
        width: '100%',
        alignItems:'center',
        marginBottom: 0,
        marginTop: 20
    },
    logo:{
        width: 140,
        height: 60,
        
    },
    auth_header_container:{
        width:'100%',
        flexDirection: 'row',
        paddingTop: 20,
        backgroundColor: Colors.background,
    },
    auth_header_left:{
        paddingLeft: 0
    },
    auth_header_left_img:{
        width: 16,
        height: 16,
    },
    loader_wrapper:{
        width,
        height,
        alignItems: 'center',
        justifyContent: 'center',
        backgroundColor: Colors.background,
        
    },
    loader_wrapper_logo:{
        width: 140,
        height: 140,
        marginTop: -height/7
    },
    page_container:{
        width: '100%',
        height,
        backgroundColor: Colors.background
    },
    page_wrapper:{
        paddingTop: 0,
        paddingHorizontal: 15,
        flexDirection: 'column',
        width,
        height,
        backgroundColor: Colors.background,
        
    },
    page_wrapper2:{
        paddingTop: 0,
        paddingHorizontal: 15,
        flexDirection: 'column',
        width,
        flex: 1,
        backgroundColor: Colors.background,
        
    },
    page_wrapper_tag:{
        paddingTop: height/20,
        paddingHorizontal: 15,
        flexDirection: 'column',
        width,
        minHeight: height,
        backgroundColor: Colors.background,
    },
    page_wrapper_top:{
       width: '100%',
       
       
    },
    page_wrapper_bottom:{
        bottom: Platform.OS == 'ios'? 110: 20,
        position: 'absolute',
        flexDirection: 'row',
        justifyContent: 'center',
        width: width,
    },
    page_wrapper_bottom_key:{
        bottom: Platform.OS == 'ios'? 140: 40,
        position: 'absolute',
        flexDirection: 'row',
        justifyContent: 'center',
        width: width,
    },

    page_wrapper_top2:{
        bottom: 40,
        position: 'absolute',
        width: width,
     },
     page_wrapper_bottom2:{
        bottom: Platform.OS == 'ios'? 150: 40,
        position: 'absolute',
        width: width,
        
     },

     page_wrapper_top3:{
        minHeight: height*.8
     },
     page_wrapper_bottom3:{
        minHeight: height*.2
        
     },
    page_title:{
        color: Colors.black,
        fontSize: 24,
        lineHeight: 32,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginTop: 30
    },
    page_title2:{
        color: Colors.black,
        maxWidth: '80%',
        fontSize: 24,
        lineHeight: 32,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginTop: 20
    },
    page_subtitle:{
        color: Colors.dark_gray,
        maxWidth: '80%',
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginTop: 20
    },

    page_subtitle2:{
        color: Colors.dark_gray,
        maxWidth: '100%',
        fontSize: 14,
        lineHeight: 18,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginTop: 12
    },
    page_subtitle3:{
        color: Colors.dark_gray,
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginTop: 0,
        textDecorationStyle: 'solid',
        textDecorationColor: Colors.dark_gray,
    },
    page_error_text_wrap:{
        flexDirection: 'row',
        width: '100%',
        marginTop: 14
    },
    page_error_text1:{
        color: Colors.dark_gray,
        fontSize: 14,
        lineHeight: 24,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        
    },
    page_error_text2:{
        color: Colors.green,
        fontSize: 14,
        lineHeight: 24,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    page_error_text11:{
        color: Colors.dark_gray,
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        
    },
    page_error_text112:{
        color: Colors.red,
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        textDecorationStyle: 'solid',
        textDecorationColor: Colors.red,
        textDecorationLine: 'underline',
    },
    form_group:{
        width: '100%',
        marginTop: 20
    },    
    form_label:{
        color: Colors.black,
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    form_input_type_1:{
        color: Colors.neutral,
        fontSize: 16,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        borderColor: Colors.lightgray,
        borderWidth: 1.2,
        paddingHorizontal: 12,
        paddingVertical: 14,
        marginTop: 10,
        borderRadius: 6,
        overflow: 'hidden',
    },
    form_input_focus_1:{
        color: Colors.gray,
        fontSize: 16,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        borderColor: '#062638',
        borderWidth: 1.6,
        paddingHorizontal: 12,
        paddingVertical: 14,
        marginTop: 10,
        borderRadius: 6,
        overflow: 'hidden',
        // shadowColor: '#E1E1FE',
        // shadowOpacity: 0.7,
        // shadowOffset: { width: 0, height: 4},
        // shadowRadius: 5,
        // elevation: 10,
    },
    input_group:{
        width: '100%',
        flexDirection: 'row',
        justifyContent: 'flex-start',
        alignItems: 'center',
        borderColor: Colors.lightgray,
        borderWidth: 1.2,
        paddingHorizontal: 12,
        paddingVertical: Platform.OS == 'ios'? 14: 4,
        borderRadius: 6,
        marginTop: 10,
    },
    input_group_focus:{
        width: '100%',
        flexDirection: 'row',
        justifyContent: 'flex-start',
        alignItems: 'center',
        borderColor: '#062638',
        borderWidth: 1.2,
        paddingHorizontal: 12,
        paddingVertical: Platform.OS == 'ios'? 14: 4,
        borderRadius: 6,
        marginTop: 10,
    },
    input_group_country_wrap:{
        paddingRight: 7,
        borderRightColor: Colors.gray,
        borderRightWidth: 1,
    },
    input_group_country:{
        flexDirection: 'row',
        alignItems: 'center',
    },
    input_group_country_imge:{
        width: 20,
        height: 20,
        borderRadius: 1.5,
    },
    input_group_country_text:{
        color: Colors.neutral,
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginHorizontal: 5
    },
    input_group_country_icon:{

    },
    form_input_type_1_group:{
        color: Colors.neutral,
        fontSize: 16,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        overflow: 'hidden',
        paddingLeft: 7,
        minWidth: width/1.8,
       
    },
    form_input_focus_1_group:{
        color: Colors.gray,
        fontSize: 16,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        borderColor: '#062638',
        overflow: 'hidden',
        // shadowColor: '#E1E1FE',
        // shadowOpacity: 0.7,
        // shadowOffset: { width: 0, height: 4},
        // shadowRadius: 5,
        // elevation: 10,
    },


    form_input_type_2_wrap:{
        flexDirection: 'row',
        borderColor: Colors.lightgray,
        borderWidth: 1.2,
        paddingTop: 0,
        paddingBottom: 0,
        paddingLeft: 0,
        marginTop: 10,
        borderRadius: 6,
        overflow: 'hidden',
    },
    form_input_type_2_wrap2:{
        flexDirection: 'row',
        borderColor: Colors.lightgray,
        borderWidth: 1.2,
        paddingTop: 0,
        paddingBottom: 0,
        paddingLeft: 10,
        marginTop: 10,
        borderRadius: 6,
        overflow: 'hidden',
    },
    form_input_focus_2_wrap:{
        flexDirection: 'row',
        borderColor: '#062638',
        borderWidth: 1.6,
        paddingTop: 0,
        paddingBottom: 0,
        paddingLeft: 0,
        marginTop: 10,
        borderRadius: 6,
        overflow: 'hidden',
    },
    form_input_focus_2_wrap2:{
        flexDirection: 'row',
        borderColor: '#062638',
        borderWidth: 1.6,
        paddingTop: 0,
        paddingBottom: 0,
        paddingLeft: 10,
        marginTop: 10,
        borderRadius: 6,
        overflow: 'hidden',
    },
    form_input_type_2:{
        color: Colors.neutral,
        fontSize: 16,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        flex: .95,
        paddingHorizontal: 12,
        paddingVertical: 14,
    },
    form_input_type_2_icon:{
        marginTop: 14
    },
    icon_andat:{
        color: Colors.neutral,
        fontSize: 21,
        lineHeight: 23,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    form_input_type_3:{
        color: Colors.neutral,
        fontSize: 16,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        flex: .9,
        paddingHorizontal: 10,
        paddingBottom: 14,
        paddingTop: 14,
        borderRadius: 6,
        overflow: 'hidden',
    },
    form_input_type_33:{
        color: Colors.neutral,
        fontSize: 16,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        flex: .9,
        paddingHorizontal: 10,
        paddingBottom: 14,
        paddingTop: 12.5,
        borderRadius: 6,
        overflow: 'hidden',
    },
    code_input_wrapper:{
        width: '100%',
        flexDirection: 'row'
    },
    codeFieldRoot: {
        marginTop: 20,
        marginRight: 0
        
    },
    cell: {
      width: 60,
      height: 60,
      paddingTop: 5,
      borderColor: Colors.lightgray,
      borderWidth: 1,
      borderRadius:5,
      overflow: 'hidden',
      paddingTop: Platform.OS == 'ios'? 23: 25,
      marginRight:10,
      fontSize: 18,
      lineHeight: 21,
      fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
      fontWeight: '600',
      backgroundColor: Colors.white,
      textAlign: 'center',
      color: Colors.button
    },

    cell2: {
        width: 60,
        height: 60,
        paddingTop: 5,
        borderColor: Colors.lightgray,
        borderWidth: 1,
        borderRadius:5,
        overflow: 'hidden',
        paddingTop: Platform.OS == 'ios'? 18: 20,
        marginRight:10,
        fontSize: 18,
        lineHeight: 21,
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        fontWeight: '600',
        backgroundColor: Colors.white,
        textAlign: 'center',
        color: Colors.button
      },


    focusCell: {
        width: 66,
        height: 66,
        paddingTop: Platform.OS == 'ios'? 17: 23,
        borderRadius:10,
        borderColor: '#F3F4F6',
        borderWidth: 6,
        shadowColor: '#F3F4F6',
        shadowOpacity: 0.7,
        shadowOffset: { width: 0, height: 2},
        shadowRadius: 10,
        elevation: 10,
        marginTop: -3,
    },
    codeError:{
       borderColor: '#FF6D6D' 
    },

    codeFieldRoot2: {
        marginTop: 20,
        width: width/1.4
    },
    use_email:{
        color: Colors.green,
        fontSize: 14,
        lineHeight: 18,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginTop: 20
    },
    attest_wrapper:{
        width: '100%',
        flexDirection: 'row',
        marginTop: 20,
    },
    attest_img_wrap:{
        flex: .09,
    },
    attest_img:{
      width: 20,
      height: 20,
    },
    attest_text_wrap:{
        flex: .91,        
    },
    attest_text:{
       width: '100%',
       color: Colors.gray,
       fontSize: 12,
       lineHeight: 16,
       fontWeight: '600',
       fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    attest_text1:{
        color: Colors.black,
        fontSize: 12,
       lineHeight: 16,
       fontWeight: '600',
       fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    attest_text2:{
        color: Colors.gray,
        fontSize: 12,
       lineHeight: 16,
       fontWeight: '600',
       fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    btn_container:{
        width:'100%',
        justifyContent:'center',
        alignItems: 'center'
    },
    btn_wrapper:{
        width: width/1.1,
        backgroundColor: Colors.button,
        paddingVertical: 15,
        textAlign: 'center',
        borderRadius: 12,
        overflow: 'hidden',
        flexDirection: 'row',
        alignItems: 'center',
        justifyContent: 'center'
    },
    btn_wrapper2:{
        width: width/1.1,
        backgroundColor: Colors.inactive_button,
        paddingVertical: 15,
        textAlign: 'center',
        borderRadius: 12,
        overflow: 'hidden',
        flexDirection: 'row',
        alignItems: 'center',
        justifyContent: 'center'
    },
    btn_text:{
        color: Colors.white,
        textAlign: 'center',
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    signin_container:{
       width: '100%',
       borderTopColor: '#e5e5e5',
       borderTopWidth: 1,
       marginTop: height/20,
       paddingTop: 20
    },
    signin_title:{
        color: Colors.black,
        fontSize: 18,
       lineHeight: 24,
       fontWeight: '600',
       fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
       marginBottom: 6
    },
    signin_wrapper:{
      flexDirection: 'row',
      marginTop: 20,
      width: '100%',
      borderBottomColor: '#e5e5e5',
      borderBottomWidth: 1,
      paddingBottom: 10
    },
    signin_btn:{
      width: 10,
      height: 10,
    },
    signin_label:{
     marginTop: 7,
     color: Colors.neutral,
    fontSize: 14,
    lineHeight: 18,
    fontWeight: '400',
    fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    link_wrapper_text3:{
        color: Colors.black,
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        textAlign: 'center',
        marginTop: 10
    },
    v_tag_title:{
        color: Colors.black,
        fontSize: 24,
        lineHeight: 32,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        textAlign: 'center',
        marginTop: 50,
    },
    v_tag_title2:{
        color: Colors.dark_gray,
        fontSize: 14,
        lineHeight: 18,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        textAlign: 'center',
        maxWidth: '80%',
        marginLeft: '10%',
        marginTop: 20
    },
    v_tag_wrapper:{
        width: '100%',
        marginLeft:width/8,
        marginTop: 20
    },
    v_tag_under:{
        marginTop: 20,
        width: width/1.5,
        height: height/6.5,
        backgroundColor: Colors.green,
        borderRadius: 10,
        overflow: 'hidden',
      },
    v_tag_tag:{
      marginTop: -height/6.1,
      width: width/1.5,
      height: height/6.6,
      marginLeft: 10,
      zIndex: 10,
      borderWidth: 1,
      borderColor: Colors.gray,
      backgroundColor: Colors.white,
      borderRadius: 12,
      overflow: 'hidden',
      justifyContent: 'center',
      alignItems: 'center',
      flexDirection: 'row'
    },
    v_tag_id:{
        color: Colors.neutral,
        fontSize: 32,
        lineHeight: 44,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        textAlign: 'center',
        marginTop: 4,
    },
    v_tag_id2:{
        color: Colors.neutral,
        fontSize: 32,
        lineHeight: 44,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        textAlign: 'center',
    },
    v_tag_subtitle:{
        color: '#323232',
        fontSize: 14,
        lineHeight: 20,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        textAlign: 'center',
        maxWidth: '80%',
        marginLeft: '10%',
        marginTop: 25,
    },

    v_tag_link_container:{
        width: '100%',
        flexDirection: 'row',
        justifyContent: 'center',
    },
    v_tag_link_wrap:{
        flexDirection: 'row',
        marginTop: 30,
        alignItems: 'center',
        borderRadius: 10,
        overflow: 'hidden',
        justifyContent: 'space-between',
        padding: 10,
        width: '90%',
        backgroundColor: '#F3F4F6',
    },
    v_tag_link_l:{
      width: 30,
      height: 30
    },
    v_tag_link_l_wrap:{
        flexDirection: 'row',
        alignItems: 'center',
    },
    v_tag_link_middle:{
        borderLeftColor: Colors.black,
        borderLeftWidth: 1.3,
        marginHorizontal: 10,
    },
    v_tag_link_middle_text:{
       marginLeft: 10,
       color: Colors.button,
       fontSize: 14,
       lineHeight: 18,
       fontWeight: '600',
       fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    v_tag_link_r:{
       width: 30,
       height: 30
    },
    secure_wrapper:{
      marginTop: 30
    },
    secure_box:{
      width: '100%',
      flexDirection: 'row',
      justifyContent: 'space-between',
      alignItems: 'center',
      paddingVertical: 15,
      borderBottomColor: Colors.lightgray,
      borderBottomWidth: 0,
    },
    secure_box_left:{
       
    },
    secure_box_left_1:{
        color: Colors.black,
        fontSize: 15,
        lineHeight: 24,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    secure_box_left_2:{
        color: Colors.neutral,
        fontSize: 13,
        lineHeight: 18,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    secure_box_img:{
        width: 60,
        height: 60,
    },
     modal:{
         width:'100%',
         margin: 0,
         marginTop: height/15,
         
     },
      modalView: {
        marginTop: 52,
        backgroundColor: Colors.white,
        borderTopRightRadius:40,
        borderTopLeftRadius: 40,
        width: '100%',     
        alignItems: "center",
        shadowColor: Colors.lightgray,
        shadowOpacity: 0.7,
        shadowOffset: { width: 0, height: 4},
        shadowRadius: 5,
        elevation: 10,
        
      },
      modal_page_wrapper:{
        paddingTop: height/20,
        paddingHorizontal: 15,
        flexDirection: 'column',
        width: '100%',
        height: '100%',
        backgroundColor: 'transparent',
    },
    modalView_back_wrapper:{
        width: '100%',
        flexDirection: 'row',
        justifyContent: 'center',
        marginTop: 20
    },
    modalView_back_btn:{
        width: width/6,
        height: 5,
        backgroundColor: '#EAEAEA',
    },
      modal_button: {
        borderRadius: 20,
        padding: 10,
        elevation: 2
      },
      buttonOpen: {
        backgroundColor: "#F194FF",
      },
      buttonClose: {
        backgroundColor: "#2196F3",
      },
      textStyle: {
        color: "white",
        fontWeight: "bold",
        textAlign: "center"
      },
      modalText: {
        marginBottom: 15,
        textAlign: "center"
      },
      header_icon:{
          width: 80,
          height: 80,
          borderRadius: 50,
          marginTop: 20,
      },
forgot_pass_link:{
    textAlign: 'right',
    marginRight: 5,
    marginTop: 5,
    color: '#6B7280',
    fontSize: 14,
    lineHeight: 24,
    fontWeight: '500',
    fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    
},
link_wrapper_text_new:{
    color: Colors.green,
    fontSize: 16,
    lineHeight: 24,
    fontWeight: '600',
    fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    textAlign: 'center',
    marginTop:0,
},

link_wrapper:{
    width: '100%',
    flexDirection: 'row',
    justifyContent: 'center',
    alignItems: 'center',
    marginTop: 10
  },
  link_wrapper_text1:{
    color: Colors.gray,
    fontSize: 16,
    lineHeight: 24,
    fontWeight: '600',
    fontFamily:'Faktum-Bold',
  },

  link_wrapper_text101:{
    color: Colors.gray,
    fontSize: 16,
    lineHeight: 24,
    fontWeight: '400',
    fontFamily:'Faktum-Regular',
  },
  link_wrapper_text2:{
    color: Colors.green,
    fontSize: 16,
    lineHeight: 24,
    fontWeight: '600',
    fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
  },
  crypto_qrcode_wrap:{
      width:'100%',
      justifyContent: 'center',
      alignItems:'center'

  },
  crypto_qrcode_qrcode:{
    marginTop: 20,
    paddingTop: 30,
    paddingBottom: 15,
    paddingHorizontal: 30,
    backgroundColor: '#ffffff',
    shadowColor: Colors.gray,
    shadowOpacity: 0.5,
    shadowOffset: { width: 0, height: 0},
    shadowRadius: 5,
    elevation: 5,
    borderRadius: 16,
  },
  
  crypto_qrcode_text:{
    textAlign: 'center',
    marginTop: 25,
    color: Colors.neutralgray,
    fontSize: 14,
    lineHeight: 24,
    fontWeight: '600',
    fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    
  },
  copied:{
    color: Colors.green,
    fontSize: 14,
    lineHeight: 18,
    fontWeight: '600',
    fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    fontStyle:'italic',
  },
})