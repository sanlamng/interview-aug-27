import {StyleSheet, Dimensions, StatusBar, Platform } from 'react-native';
import { Colors } from '../../constants/Colors';
const {width, height} = Dimensions.get('window');
const STATUSBAR_HEIGHT = StatusBar.currentHeight;


export default  styles = StyleSheet.create({
    statusBar: {
        height: STATUSBAR_HEIGHT,
      },
      appBar: {
        backgroundColor:'red',
        height: STATUSBAR_HEIGHT,
     },
     keyboard_wrap:{
       width: '100%',
       padding: 0,
       margin: 0,
       marginBottom: 15,
     },
     keyboard_wrap2:{
      width,
      padding: 0,
      margin: 0,
      marginBottom: height/10,
    },
    keyboard_row:{
      width,
      margin: 0,
      padding: 0,
      marginLeft: -width/11,
    },
    keyboard_row2:{
      width,
      margin: 0,
      padding: 0,
      marginLeft: -width/19,
   },
     keyboard_key:{
      backgroundColor: '#F9FAFB',
       marginRight: width/20,
       fontWeight: '600',
      
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
     width: '100%',
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

 bar_wrapper:{
  paddingTop: height/15, 
  marginLeft: '-16%',
},
figure_wrapper:{
  width: width/5.6,
  alignItems: 'center',
  marginBottom: 10
},
figure_wrapper_top:{
 marginBottom: 10,
 width: '100%',
 backgroundColor: Colors.button,
 paddingVertical: 10,
 flexDirection: 'row',
 justifyContent: 'center',
 borderRadius: 5,
 overflow: 'hidden',
},
figure_wrapper_top_text:{
  color: Colors.white,
  fontSize: 10,
  lineHeight: 10,
  fontWeight: '400',
  fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
},
figure_wrapper_middle:{
width:10,
height:10,
borderLeftWidth:10,
borderLeftColor:"transparent",
borderRightWidth:10,
borderRightColor:"transparent",
borderTopWidth:10,
borderTopColor:Colors.button,
marginTop:-10,
marginBottom: 10
},
figure_wrapper_bottom:{
  paddingBottom: 20
},
bar_labelTextStyle:{
  color: Colors.neutral,
  fontSize: 30,
  lineHeight: 12,
  fontWeight: '400',
  fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
},


    dashboard_wrapper:{
       width: '100%',
       backgroundColor: Colors.white,
       marginTop: Platform.OS == 'ios'? -20: 0
    },

    dashboard_wrapper2:{
        width: '100%',
        backgroundColor: Colors.white,
        marginTop: Platform.OS == 'ios'? -20: 0
     },
    dashboard_wrapper_top:{
       width: '100%',
       paddingHorizontal: 10,
       backgroundColor: Colors.white,
      
    },
    dashboard_more_logout:{
      width:'100%',
      flexDirection: 'row',
      justifyContent: 'center',
      paddingTop: 0,
      paddingBottom: 60,
      backgroundColor: Colors.background
    },
    dashboard_more_logout_text:{
      color: 'red',
        fontSize: 14,
        lineHeight: 18,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    dashboard_main_wrapper:{
     width: '100%',
     height,
     backgroundColor: Colors.background,
     paddingTop: 0,
    },
    header_wrapper:{
        width: '100%',
        flexDirection: 'row',
        justifyContent: 'space-between',
        marginTop: Platform.OS == 'ios'? 0: 0,
        alignItems: 'center',
        paddingHorizontal: 15,
        marginBottom: 5,
        backgroundColor: Colors.background,
        position: 'absolute',
        minHeight: 60,
        top: 0,
        paddingTop: Platform.OS == 'ios'? 0: 10,
       
        zIndex: 10,

    },
    header_wrapper_inner:{
      width: '100%',
      flexDirection: 'row',
      justifyContent: 'space-between',
      marginTop: Platform.OS == 'ios'? 0: 10,
      alignItems: 'center',
  },
    header_wrapper_left:{
      width:'27%',
      flexDirection: 'row'
    },
    header_wrapper_left2:{
      width:'36%',
      flexDirection: 'row'
    },
    header_wrapper_right:{
      width:'73%',
      flexDirection: 'row'
    },

    header_wrapper_left_c:{
      width:'40%',
      flexDirection: 'row'
    },
    header_wrapper_right_c:{
      width:'60%',
      flexDirection: 'row'
    },


    header_wrapper_left_d:{
      width:'34%',
      flexDirection: 'row'
    },
    header_wrapper_right_d:{
      width:'66%',
      flexDirection: 'row'
    },
    header_wrapper_profile:{
        width: '100%',
        flexDirection: 'row',
        justifyContent: 'space-between',
        alignItems: 'center',
        marginTop: Platform.OS == 'ios'? 6: 14,
        paddingHorizontal: 15,
        marginBottom: 5,
        backgroundColor: Colors.background,
        position: 'absolute',
        minHeight: 60,
        top: 0,
        marginTop: 0,
        zIndex: 10,
    },
    header_wrapper_stats:{
        width: '100%',
        flexDirection: 'row',
        justifyContent: 'space-between',
        alignItems: 'center',
        marginTop: 6
    },
    header_left_text:{
        color: Colors.neutral,
        fontSize: 32,
        lineHeight: 40,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    header_icon:{
      width: 47,
      height: 47,
      borderRadius: 50,
      overflow: 'hidden',
    },
    header_icon_profile:{
        width: 36,
        height: 36,
        overflow: 'hidden',
        borderRadius: 50,
      },
    header_icon_back:{
        width: 18,
        height: 18,
      },
    header_menu_wrap:{
       backgroundColor: '#fff',
       paddingVertical: 11,
       paddingHorizontal:11,
       shadowColor: Colors.gray,
       shadowOpacity: 0.5,
       shadowOffset: { width: 0, height: 1},
       shadowRadius: 5,
       elevation: 10,
       borderRadius: 50,
       marginTop: 5
    },
    header_menu:{
      
    },
    header_middle:{
      color: Colors.neutral,
      fontSize: 16,
      lineHeight: 24,
      fontWeight: '400',
      fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
    },
    logo_wrapper:{
        width: '100%',
        alignItems:'center',
        marginBottom: 30
    },
    logo:{
        width: 140,
        height: 60,
        
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
  },

  btn_wrapper_green:{
    width: width/1.1,
    backgroundColor: Colors.green,
    paddingVertical: 15,
    alignItems: 'center',
    justifyContent:'center',
    borderRadius: 12,
    overflow: 'hidden',
    flexDirection: 'row',
},

btn_wrapper_white:{
  width: width/1.1,
  backgroundColor: Colors.white,
  paddingVertical: 15,
  flexDirection: 'row',
  alignItems: 'center',
  justifyContent:'center',
  borderRadius: 12,
  overflow: 'hidden',
  borderColor: Colors.lightgray,
  borderWidth: 1,
  marginTop: 10
},
btn_wrapper_small_white:{
  width: width/3.5,
  backgroundColor: Colors.white,
  paddingVertical: 10,
  flexDirection: 'row',
  alignItems: 'center',
  justifyContent:'center',
  borderRadius: 12,
  overflow: 'hidden',
  borderColor: Colors.lightgray,
  borderWidth: 1,
  marginTop: 10
},
btn_text_white:{
  color: Colors.neutral,
  textAlign: 'center',
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '600',
  fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
},
btn_wrapper_green_img:{
  width: 20,
  height: 20,
  marginLeft: 10
},
btn_wrapper_white_img:{
  width: 20,
  height: 20,
  marginLeft: 10
},

  btn_wrapper2:{
      width: width/1.1,
      backgroundColor: Colors.inactive_button2,
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
    auth_header_container:{
        width:'100%',
        flexDirection: 'row',
        marginTop: 10
    },
    auth_header_left:{
        paddingLeft: 10
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
        backgroundColor: Colors.background
        
    },
    loader_wrapper_logo:{
        width: 140,
        height: 140,
        marginTop: -height/7
    },
    page_wrapper:{
        marginTop: height/20,
        paddingHorizontal: 15,
        flexDirection: 'column',
        width,
        height
    },
    page_wrapper_tag:{
        marginTop: 20,
        paddingHorizontal: 15,
        flexDirection: 'column',
        width,
        height
    },
    page_wrapper_top:{
       flex: .72,
    },
    page_wrapper_bottom:{
       flex:.28,
    },
    page_title:{
        color: Colors.black,
        fontSize: 24,
        lineHeight: 32,
        fontWeight: '600',
       
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
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

    page_subtitle4:{
      color: Colors.dark_gray,
      maxWidth: '70%',
      fontSize: 14,
      lineHeight: 18,
      fontWeight: '400',
      fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
      marginTop: 12
  },

    centeredView: {
        flex: 1,
        justifyContent: "center",
        alignItems: "center",
        marginTop: 100
      },
      modalView: {
        marginTop: height/10,
        backgroundColor: Colors.white,
        borderRadius: 20,
        width,
        height,
        alignItems: "center",
        shadowColor: "#000",
        shadowOffset: {
          width: 0,
          height: 2
        },
        shadowOpacity: 0.25,
        shadowRadius: 4,
        elevation: 5
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
      balance_wrapper:{
       width: '100%',
       marginTop: 32,
       backgroundColor: Colors.white
      },
      balance_wrapper_stats:{
        width: '100%',
        marginTop: 5,
        justifyContent: 'center',
        alignItems: 'center',
       },
      balance_top:{
        width: '100%',
        flexDirection: 'row',
        textAlign: 'center'
      },
      balance_top_a:{
        color: Colors.black,
        fontSize: 14,
        lineHeight: 20,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
      },
      balance_top_b:{
        marginLeft: 15
      },
      balance_middle:{
        width: '100%',
        flexDirection: 'row',
        marginTop: 13, 
        backgroundColor: Colors.white
      },
      balance_middle_stats:{
        width: '100%',
        flexDirection: 'row',
        justifyContent: 'center',
        marginTop: 13
      },
      balance_middle_a:{
        paddingHorizontal: 8,
        paddingVertical: 8,
        backgroundColor: Colors.lightgray,
        borderRadius: 50,
        overflow: 'hidden',
      },
      balance_middle_a_img:{
          width: 25,
          height: 25,
      },
      balance_middle_balance:{
          flexDirection: 'row',
          alignItems: 'baseline',
      },
      balance_middle_b:{
        marginLeft: 10,
        color: Colors.neutral,
        fontSize: 36,
        lineHeight: 44,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
      },
      balance_middle_c:{
        color: Colors.black,
        fontSize: 14,
        lineHeight: 18,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
      },
      balance_middle_d_wrap:{
        width: '25%',
        marginLeft: 20
      },
      balance_middle_d:{
        width: '100%',
      },
      balance_bottom:{
          marginTop: 10,
          width: '100%',
          flexDirection: 'row',
          alignItems: 'center',
      },
      balance_bottom_stats:{
        marginTop: 10,
        width: '100%',
        flexDirection: 'row',
        justifyContent: 'center',
        alignItems: 'center',
    },
      balance_bottom_a:{
        color: Colors.green,
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
      },
      balance_bottom_b:{
        color: Colors.black,
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginLeft: 6,
      },

      action_wrapper:{
        width: '100%',
        flexDirection: 'row',
        marginTop: 30,
        backgroundColor: Colors.white,
      },
      action_box:{
        width: '22%',
        marginRight: '3%',
        alignItems: 'center',
        backgroundColor: Colors.white,
      },
      action_box_image_wrap:{
        paddingVertical: 13,
        paddingHorizontal: 13,
        backgroundColor: Colors.button,
        borderRadius: 50,
        overflow: 'hidden',
      },
      action_box_image:{
        width: 25,
        height: 25,
      },
      action_box_text:{
        marginTop: 10,
        color: Colors.button,
        fontSize: 14,
        lineHeight: 18,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
      },
      site_wrapper:{
        backgroundColor: Colors.white,
        marginTop: 40,
        paddingHorizontal: 15,
        paddingTop: 25,
        paddingBottom: 30,
        borderTopColor: '#E5E7EB',
        borderTopWidth: 1,
      },
      site_header:{
        flexDirection: 'row',
        width: '100%',
        justifyContent: 'space-between',
        marginBottom: 20
      },
      site_header_text:{
        color: Colors.button,
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
      },
      site_header_icon:{
          
      },
      site_bottom:{

      },
      site_bottom_box_cover:{
        flexDirection: 'row',
        marginLeft: 3
      },
      site_bottom_box:{
        marginRight: 15,
        marginBottom: 20
      },
      site_bottom_box2:{
        flexDirection: 'row',
        justifyContent:'center',
        alignItems:'center',
        marginTop: -15,
      },
      site_bottom_box2_txt:{
        color: '#9CA3AF',
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
      },
      site_bottom_box_image:{
         width: 60,
         height: 60,
         borderRadius: 50,
         overflow: 'hidden',
      },
      site_bottom_box_icon_wrap:{
         paddingHorizontal: 18,
         paddingVertical: 18,
         backgroundColor: Colors.white,
         borderRadius: 50,
         shadowColor: Colors.gray,
         shadowOpacity: 0.5,
         shadowOffset: { width: 0, height: 3},
         shadowRadius: 5,
         elevation: 10,
      },
      site_bottom_box_icon:{
          
      },

      trans_wrapper:{
        width: '100%',
        backgroundColor: Colors.white,
        marginTop: -20,
        paddingHorizontal: 15,
        paddingTop: 30,
        paddingBottom: 40,
        // borderTopLeftRadius: 30,
        // borderTopRightRadius: 30,
        overflow: 'hidden',
        zIndex: 20,
        // borderColor: '#F3F4F6',
        // borderWidth: 1.5
      },
      trans_header:{
        flexDirection: 'row',
        width: '100%',
        justifyContent: 'space-between',
        marginBottom: 20
      },
      trans_header_text:{
        color: Colors.button,
        fontSize: 16,
        lineHeight: 24,
        fontWeight: '600',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
      },
      trans_header_icon:{
          
      },
      trans_bottom:{
       paddingBottom: 30,
      },
      trans_bottom_no:{
       paddingVertical: 20,
       justifyContent: 'center',
       alignItems: 'center',
       paddingBottom: 20,
      },
      trans_bottom_no_image:{
        width: 100,
        height: 100
     },
     trans_bottom_no_text:{
        color: Colors.neutralgray,
        fontSize: 14,
        lineHeight: 18,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginTop: 7,
     },
      transaction_box_wrap:{
          width: '100%',
          marginTop: 0,
          marginBottom: 10,
      },
      transaction_box_header:{
        color: Colors.neutralgray,
        fontSize: 12,
        lineHeight: 16,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginBottom: 10,
      },
      transaction_box_box:{
        width: '100%',
        flexDirection: 'row',
        justifyContent: 'space-between',
        marginBottom: 20,
      },
      transaction_box_box_img:{
        width: 50,
        height: 50,
        borderRadius:50,
        overflow: 'hidden',
      },
      transaction_box_left_wrap:{
        flexDirection: 'row',
        
      },
      transaction_box_left:{
        marginLeft: 15
      },
      transaction_box_left_a:{
        color: Colors.button,
        fontSize: 14,
        lineHeight: 18,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginTop: 3,
      },
      transaction_box_left_b:{
        color: Colors.neutralgray,
        fontSize: 11,
        lineHeight: 16,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginTop: 5,
      },
      transaction_box_right:{
         justifyContent: 'flex-end',
         alignItems: 'flex-end'
      },
      transaction_box_right_a:{
        color: Colors.button,
        fontSize: 14,
        lineHeight: 18,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginTop: 3,
      },
      transaction_box_right_b:{
        color: Colors.neutralgray,
        fontSize: 11,
        lineHeight: 16,
        fontWeight: '400',
        fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
        marginTop: 5,
      },
     
account_details:{
  width:'100%',
  paddingHorizontal: 10,
  marginBottom: 10
},
account_details_header:{
  color: Colors.button,
  fontSize: 20,
  lineHeight: 24,
  fontWeight: '500',
  fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
  marginTop: 3,
},
account_details_text:{
  color: Colors.black,
  fontSize: 15,
  lineHeight: 18,
  fontWeight: '400',
  fontFamily: Platform.OS == 'ios' ? 'Helvetica': 'Roboto',
  marginTop: 3,
},
})