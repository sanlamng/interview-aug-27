import {StyleSheet, Dimensions, StatusBar, Platform } from 'react-native';
import { Colors } from '../../constants/Colors';
const {width, height} = Dimensions.get('window');
const STATUSBAR_HEIGHT = StatusBar.currentHeight;


export default  styles = StyleSheet.create({
deposittwo_main_top_d_c:{
  color: Colors.neutral,
  fontSize: 24,
  lineHeight: 32,
  fontWeight: '700',
  fontFamily: 'Faktum-Regular',
  maxWidth: '80%',
  marginTop: 20,
  marginBottom: 20,
  textAlign: 'center',
  
},
deposittwo_main_bottom:{
  color: Colors.green,
  fontSize: 14,
  lineHeight: 18,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
  maxWidth: '80%',
  marginTop: 20,
  marginBottom: 40,
  textAlign: 'center',
  
},
detail_wrapper:{
  width: '100%',
},
detail_wrapper2:{
  width: '100%',
  marginTop: 20
},
detail_heading_wrap:{
  flexDirection: 'row',
  width: '100%',
  alignItems: 'center'
},
detail_heading_icon:{
  paddingVertical: 6,
  paddingHorizontal: 6,
  backgroundColor: Colors.neutral,
  borderRadius: 50,
  justifyContent: 'center',
  alignItems: 'center',
  flexDirection: 'row'
},
detail_wrapper_heading_b:{
  color: Colors.neutral,
  fontSize: 14,
  lineHeight: 18,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
  width: '46%'
},
detail_wrapper_heading:{
  color: Colors.neutral,
  fontSize: 14,
  lineHeight: 18,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
},

detail_container:{
 width: '99%',
 marginHorizontal:'.5%',
 backgroundColor: Colors.white,
 borderRadius: 12,
 shadowColor: Colors.lightgray,
 shadowOpacity: 0.7,
 shadowOffset: { width: 0, height: 0},
 shadowRadius: 5,
 elevation: 5,
 marginTop: 20
},
detail_list:{
  paddingHorizontal: 10,
  paddingVertical: 20,
  flexDirection: 'row',
  justifyContent: 'space-between',
},
detail_list_mid:{
  paddingHorizontal: 10,
  paddingVertical: 15,
  flexDirection: 'row',
  justifyContent: 'space-between',
  borderTopColor: Colors.lightgray,
  borderTopWidth: 1,
  borderBottomColor: Colors.lightgray,
  borderBottomWidth: 1,
},
detail_list_left:{
  color: Colors.neutral,
  fontSize: 14,
  lineHeight: 16,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
},
detail_list_right:{
  color: Colors.neutral,
  fontSize: 14,
  lineHeight: 16,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
},







detail_container_p2pfulfil:{
  width: '99%',
  marginHorizontal:'.5%',
  backgroundColor: Colors.white,
  borderRadius: 12,
  shadowColor: Colors.lightgray,
  shadowOpacity: 0.7,
  shadowOffset: { width: 0, height: 0},
  shadowRadius: 5,
  elevation: 5,
  marginTop: 0,
  paddingTop: 20,
 },

 detail_header_p2pfulfil:{
  color: Colors.neutral,
   fontSize: 16,
   lineHeight: 23,
   fontWeight: '600',
   fontFamily: 'Faktum-Regular',
   textAlign: 'center',
   marginBottom: 10,
 },
 detail_list_p2pfulfil:{
   paddingHorizontal: 15,
   paddingVertical: 25,
   flexDirection: 'row',
   justifyContent: 'space-between',
 },
 detail_list_mid_p2pfulfil:{
   paddingHorizontal: 15,
   paddingVertical: 25,
   flexDirection: 'row',
   justifyContent: 'space-between',
   borderTopColor: Colors.lightgray,
   borderTopWidth: 1,
   
 },
 detail_list_left_p2pfulfil:{
   color: Colors.neutral,
   fontSize: 14,
   lineHeight: 16,
   fontWeight: '400',
   fontFamily: 'Faktum-Regular',
 },
 detail_list_right_p2pfulfil:{
   color: Colors.neutral,
   fontSize: 14,
   lineHeight: 16,
   fontWeight: '400',
   fontFamily: 'Faktum-Regular',
 },




confirm_modal: {
  flex: 1,
  justifyContent: "center",
  alignItems: "center",
  bottom: 0,

},
modalView: {
 
  backgroundColor: Colors.white,

  borderTopRightRadius:32,
  borderTopLeftRadius: 32,
  width,
  height: height/2.7,
  bottom: 0,
  position:'absolute',
  alignItems: "center",
  shadowColor: "#000",
  shadowOffset: {
    width: 0,
    height: 0
  },
  shadowOpacity: 0.25,
  shadowRadius: 4,
  elevation: 5
},



modal_header:{
  width: '100%',
  flexDirection: 'row',
  justifyContent: 'space-between',
  marginTop: 15,
  alignItems: 'center',
  marginBottom: 20,
  paddingHorizontal: 30
},

modal_header_left:{
 paddingHorizontal: 10,
 paddingVertical: 10,
 backgroundColor: Colors.white,
 borderRadius: 50,
//  shadowColor: Colors.lightgray,
//  shadowOpacity: 0.7,
//  shadowOffset: { width: 0, height: 1},
//  shadowRadius: 5,
//  elevation: 20,
},
modal_header_left_img:{
 width: 12,
 height: 12
},
modal_header_middle:{
color: Colors.neutral,
fontSize: 18,
lineHeight: 24,
fontWeight: '400',
fontFamily: 'Faktum-Regular',
},
modal_header_right:{
paddingHorizontal: 10,
paddingVertical: 10,
backgroundColor: Colors.white,
borderRadius: 50,
shadowColor: Colors.gray,
shadowOpacity: 0.5,
shadowOffset: { width: 0, height: 0},
shadowRadius: 2,
elevation: 5,
},
modal_header_right_img:{
width: 14,
height: 14
},
withdraw_text:{
  color: '#6B7280',
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
  maxWidth: '80%',
  textAlign: 'center',
  marginTop: 10,
},


timeline_container: {
  flex: 1,
  paddingTop:5,
  backgroundColor:'white',
  marginLeft: -width/8,
  minHeight: 400,
},
timeline_list_wrap:{
    width: '100%',
    paddingBottom: 15
    
},
title:{
  fontSize:16,
  fontWeight: 'bold',
  lineHeight: 20,
  marginTop: -10
},
description_container:{
  flexDirection: 'row',
  paddingRight: 0
},

text_description: {
  marginLeft: 0,
  color: 'gray'
},



step_container:{
  width: '100%',
  marginTop: 15,
  paddingLeft: 15,
},
step_wrapper:{
  width: '100%',
},
step_header:{
  width: '100%',
  flexDirection: 'row'
},
step_header_image:{
 width: 23,
 height: 23,
 borderRadius: 100,
 overflow: 'hidden',
},
step_header_image_wrap:{
  width:'8%',
},
step_header_text_wrap:{
  width: '92%',
  flexDirection: 'row',
  justifyContent: 'space-between',
  alignItems: 'center',
  paddingLeft: 5
},
step_header_text:{
  color: '#444444',
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
},
step_header_button_wrap:{
  paddingHorizontal: 10,
  paddingVertical: 2,
  backgroundColor: Colors.background,
  borderRadius: 4,
  borderWidth: 1,
  borderColor: Colors.lightgray
},
step_header_button:{
  color: Colors.neutral,
  fontSize: 14,
  lineHeight: 18,
  fontWeight: '500',
  fontFamily: 'Faktum-Regular',
},
step_box:{
  width: '100%',
  paddingLeft:10,
  paddingRight:15,
  paddingTop: 0,
  paddingBottom: 25,
  marginLeft: 10,
  borderColor: '#9CA3AF',
  borderLeftWidth: .5,
  borderRadius : 1,
  //height:'100%',
},
step_box_nil:{
  width: '100%',
  paddingLeft:10,
  paddingRight:15,
  paddingTop: 0,
  paddingBottom: 25,
  marginLeft: 10,
  
},
step_box_row:{
  width: '100%',
  flexDirection: 'row',
  justifyContent: 'space-between',
  marginTop: 10,
  paddingLeft: 14
},
step_box_text:{
  color: '#9CA3AF',
  fontSize: 12,
  lineHeight: 16,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
},
step_box_image:{
  width: 15,
  height: 15,
  borderRadius: 100,
  overflow: 'hidden',
},



form_input_type_2_wrap2:{
  flexDirection: 'row',
  borderColor: Colors.lightgray,
  borderWidth: 1.2,
  paddingTop: 0,
  paddingBottom: 0,
  paddingLeft: 10,
  marginTop: 4,
  borderRadius: 6,
  overflow: 'hidden',
  backgroundColor: '#F9FAFB'
},
form_input_focus_2_wrap2:{
  flexDirection: 'row',
  borderColor: '#062638',
  borderWidth: 1.6,
  paddingTop: 0,
  paddingBottom: 0,
  paddingLeft: 10,
  marginTop: 4,
  borderRadius: 6,
  overflow: 'hidden',
  backgroundColor: '#F9FAFB'
},

form_input_type_44:{
  color: Colors.neutral,
  fontSize: 16,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
  flex: .9,
  paddingHorizontal: 10,
  paddingBottom: 14,
  paddingTop: 12.5,
  borderRadius: 6,
  overflow: 'hidden',
  
},

depositeone_box:{
  width: '100%',
  flexDirection: 'row',
  justifyContent: 'flex-start',
  alignItems: 'center',
  marginBottom: 27,
},
depositeone_box_left:{
  paddingVertical: 13,
  paddingHorizontal: 13,
  backgroundColor: Colors.green,
  borderRadius: 50,
  overflow: 'hidden',
},
depositeone_box_right_a:{
  color: '#000000',
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
},



depositeone_box_edit:{
  width: '100%',
  flexDirection: 'row',
  justifyContent: 'flex-start',
  alignItems: 'center',
  marginBottom: 20,
  borderBottomColor: '#F3F4F6',
  borderBottomWidth: 1,
  paddingBottom: 15
},
depositeone_box_edit_left:{
  paddingVertical: 13,
  paddingHorizontal: 13,
  backgroundColor: Colors.button,
  borderRadius: 50,
  overflow: 'hidden',
  
},

depositeone_box_edit_left_img:{
  width: '100%',
  height: 25,
},
depositeone_box_edit_right:{
  marginLeft: 15,
  width:'86%'
},
depositeone_box_edit_right_a:{
  color: Colors.black,
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '500',
  fontFamily: 'Faktum-Medium',
},
depositeone_box_edit_right_b:{
  color: Colors.gray,
  fontSize: 12,
  lineHeight: 16,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
},
depositeone_box_right_up:{
 width:'100%',
 flexDirection: 'row',
 justifyContent:'space-between',
 alignItems: 'center',
 paddingRight: 10,
},
depositeone_box_right_down:{
  width:'100%',
  flexDirection: 'row',
  justifyContent:'space-between',
  alignItems: 'center',
  paddingRight: 10,
  marginTop: 5,
},

trans_wrapper:{
  width: '100%',
  backgroundColor: Colors.white,
  marginTop: 0,
  paddingHorizontal: 15,
  paddingTop: 20,
  paddingBottom: 20,
  overflow: 'hidden',
  borderTopColor: '#F3F4F6',
  borderTopWidth: 1,
},

trans_header_text:{
  color: Colors.button,
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '600',
  fontFamily: 'Faktum-Bold',
  marginBottom: 20,
},

transaction_box_box:{
  width: '100%',
  flexDirection: 'row',
  justifyContent: 'space-between',
  marginBottom: 20,
},

transaction_box_box_border:{
  width: '100%',
  flexDirection: 'row',
  justifyContent: 'space-between',
  paddingBottom: 20,
  marginBottom: 20,
  borderBottomColor: '#F3F4F6',
  borderBottomWidth: 1,
},
transaction_box_left_wrap:{
  flexDirection: 'row',
  
},
transaction_box_left:{
  marginLeft: 15,
 
},

deposittwo_main_middle:{
  width: '100%',
  alignItems: 'center',
  marginTop: height/10
},
deposittwo_main_input:{
  width: '100%',
  flexDirection: 'column',
  justifyContent: 'center',
  alignItems: 'center',
  textAlign: 'center',
},
deposittwo_main_middle_a:{
  color: Colors.button,
  fontSize: 72,
  lineHeight: 72,
  fontWeight: '600',
  fontFamily: 'Faktum-Bold',
  width: '100%',
  textAlign: 'center',
},

max_amount:{
  paddingHorizontal: 16,
  paddingVertical: 2,
  borderColor: Colors.green,
  borderWidth: .5,
  borderRadius: 4,
  overflow: 'hidden',
  marginTop: 12,
},
max_amount_text:{
  color: Colors.green,
  fontSize: 12,
  lineHeight: 16,
  fontWeight: '500',
  fontFamily: 'Faktum-Medium',
},
transaction_box_left_a:{
  color: Colors.black,
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
  marginTop: 3,
},
transaction_box_left_b:{
  color: Colors.neutralgray,
  fontSize: 11,
  lineHeight: 16,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
  marginTop: 0,
},
transaction_box_right:{
 justifyContent: 'center'
},
transaction_box_right_a:{
  color: Colors.button,
  fontSize: 14,
  lineHeight: 18,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
  marginTop: 3,
},
transaction_box_right_b:{
  color: Colors.neutralgray,
  fontSize: 11,
  lineHeight: 16,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
  marginTop: 5,
},
transaction_box_flag:{
   width: 20,
   height: 20,
   borderRadius: 2,
   overflow: 'hidden',
},

wallet_two_top:{
  width:'100%',
  marginTop: height/13,
  paddingHorizontal: 15,
  marginBottom: 30
},
wallet_two_top_text:{
  color: Colors.button,
  fontSize: 20,
  lineHeight: 28,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
},
wallet_two_box:{
  width:'100%',
  paddingHorizontal: 15,
  borderBottomColor: '#F3F4F6',
  borderBottomWidth: 1,
  borderTopColor: '#F3F4F6',
  borderTopWidth: 1,
  paddingVertical: 20,
  marginBottom: 15
},
wallet_two_box_2:{
  width:'100%',
  paddingHorizontal: 15,
},
wallet_two_box_texta:{
  color: Colors.button,
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
  marginBottom:5,
},
wallet_two_box_textb:{
  color: Colors.button,
  fontSize: 36,
  lineHeight: 44,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
  marginBottom:5,
},
wallet_two_box_textc:{
  color: Colors.button,
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
  marginBottom:9,
},
wallet_two_bottom_wrap:{
  width: '100%',
  flexDirection: 'row',
  justifyContent: 'center',
  alignItems: 'center'
},
wallet_two_bottom_text:{
  color: Colors.button,
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
  marginBottom:9,
},
wallet_two_bottom_text_b:{
  color: Colors.button,
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
  marginBottom:9,
},


beneficiary_wrap:{
  width: '100%',
  marginTop: 30,
  borderBottomColor: '#F3F4F6',
  borderBottomWidth: 2,
  paddingBottom: 20,
  
},
beneficiary_heading:{
  color: Colors.button,
  fontSize: 14,
  lineHeight: 18,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
  marginBottom:9,
},
beneficiary:{
 paddingVertical: 10,
},
beneficiary_box:{
  width: width/5.3,
  marginRight: 20,
  alignItems: 'center',
  
},
beneficiary_image:{
  paddingHorizontal: 20,
  paddingVertical: 20,
  justifyContent: 'center',
  alignItems: 'center',
  borderRadius: 50,
  borderWidth:1,
  borderColor: Colors.button
},
beneficiary_image_img:{
  width: 20,
  height: 20,
},
beneficiary_text:{
  textAlign: 'center',
  marginTop: 5,
  color: Colors.black,
  fontSize: 11,
  lineHeight: 14,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
},

beneficiary_text_b:{
  textAlign: 'center',
  marginTop: 0,
  color: Colors.black,
  fontSize: 11,
  lineHeight: 14,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
},

beneficiary_box1:{
  width: width/5,
  marginRight: 15,
  alignItems: 'center',
  
},
beneficiary_image1:{
  paddingHorizontal: 15,
  paddingVertical: 15,
  justifyContent: 'center',
  alignItems: 'center',
  borderRadius: 50,
  borderWidth:1,
  borderColor: Colors.button,
  backgroundColor: '#f4f7f9',
},
beneficiary_image_img1:{
  width: 30,
  height: 30,
},

beneficiary_box_small:{
  width: width/5,
  marginRight: 15,
  alignItems: 'center',
  paddingTop: 3
  
},
beneficiary_image_small:{
  paddingHorizontal: 14,
  paddingVertical: 14,
  justifyContent: 'center',
  alignItems: 'center',
  borderRadius: 50,
  borderWidth:1,
  borderColor: Colors.button,
  backgroundColor: '#f4f7f9',
},
beneficiary_image_img_small:{
  width: 30,
  height: 30,
},

beneficiary_box2:{
  width: width/5.3,
  marginRight: 20,
  alignItems: 'center',
  
},
beneficiary_image2:{
  paddingHorizontal: 15,
  paddingVertical: 15,
  justifyContent: 'center',
  alignItems: 'center',
  borderRadius: 50,
  borderWidth:1,
  borderColor: Colors.button
},
beneficiary_image_img2:{
  width: 30,
  height: 30,
},

input_group_country_container:{
  width: '100%',
  marginTop: 20
},
input_group_country_flag:{
 flexDirection:'row',
},
input_group_country_inner:{
  width: '100%',
  flexDirection: 'row',
  justifyContent: 'space-between',
  borderWidth: 1,
  flexDirection: 'row',
  borderColor: Colors.lightgray,
  paddingVertical: 14,
  marginTop: 0,
  paddingHorizontal: 10,
  alignItems:'center',
  borderRadius: 6,
},
input_group_country:{
 width: '100%',
 marginTop: 10,
},
input_group_country_imge:{
  marginRight: 10,
},
input_group_country_text:{
  color: Colors.neutralgray,
  fontSize: 14,
  lineHeight: 18,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
  
},
input_group_country_icon:{

},

save_bene_wrap:{
   flexDirection: 'row',
   width: '100%',
   justifyContent: 'space-between'
},
save_bene_right:{
  flexDirection: 'row',
  
},
save_bene_img:{
  width: 20,
  height: 20,
},

save_bene_img2:{
  width: 15,
  height: 15,
  marginTop:2,
},
wallet_two_box_textd:{
  color: Colors.button,
  fontSize: 14,
  lineHeight: 18,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
  marginLeft: 5,

},

dashboard_eprofile_middle:{
  width: '100%',
  justifyContent: 'center',
  alignItems: 'center',
  marginTop: 30,
  paddingBottom: 35,
 
},
dashboard_eprofile_middle_img:{
    width: 80,
    height: 80,
    borderRadius: 50,
},
dashboard_eprofile_middle_cam:{
 marginTop: -59,
 zIndex: 10,
 width: 35,
 height: 35,
 marginLeft: 4,
}, 

dashboard_eprofile_note:{
  color: Colors.button,
  fontStyle:'italic',
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
  marginTop: 10,
},

bank_directory:{
  flexDirection: 'row',
  alignItems: 'center'
},
bank_dir_image_wrap:{
  paddingHorizontal: 10,
  paddingVertical: 10,
  backgroundColor:'#E6E9EB',
  borderRadius: 50,
  marginRight: 10,
},
bank_dir_image:{
  width: 20,
  height: 20,
  
},
dashboard_more_box_bottom_text:{
  color: Colors.button,
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
},
tab_title:{
  
  fontSize: 16,
  lineHeight: 24,
  fontWeight: '600',
  fontFamily: 'Faktum-Regular',
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
    fontFamily: 'Faktum-Bold',
},
secure_box_left_2:{
    color: Colors.neutral,
    fontSize: 13,
    lineHeight: 18,
    fontWeight: '400',
    fontFamily: 'Faktum-Light',
},
secure_box_img:{
    width: 60,
    height: 60,
},
search_results:{
 marginTop: 25,
},

dropdown4DropdownStylenew: {
  backgroundColor: Colors.white,
  borderBottomRightRadius: 10,
  borderBottomLeftRadius: 10,
  
},
dropdown4DropdownStylenew2: {
  backgroundColor: Colors.white,
  borderBottomRightRadius: 10,
  borderBottomLeftRadius: 10,
  width: '94%',
  marginLeft: '-6%'
  

  
},
dropdown4RowStylenew: {
  backgroundColor: Colors.white, 
  borderBottomColor: '#C5C5C5',
  
},
dropdown4RowTxtStylenew: {
    color: Colors.neutralgray,
    fontSize: 14,
    lineHeight: 16,
    fontWeight: '400',
    fontFamily: 'Faktum-Regular',
    textAlign: 'left'
},
deposittwo_main_middle_banknew:{
  paddingHorizontal: 0,
  height: '100%',
  backgroundColor: Colors.white,
  width: '100%',
  borderTopRightRadius: 12,
  borderBottomRightRadius: 12,
  paddingHorizontal: 2,
  paddingVertical: 12,
  overflow: 'hidden',
},
deposittwo_main_middle_banknew2:{
  paddingHorizontal: 0,
  height: '100%',
  backgroundColor: Colors.white,
  width: '90%',
  borderTopRightRadius: 12,
  borderBottomRightRadius: 12,
  paddingHorizontal: 2,
  paddingVertical: 12,
  overflow: 'hidden',
},
deposittwo_main_middle_bank_textnew:{
  color: Colors.neutralgray,
  fontSize: 14,
  lineHeight: 18,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
  textAlign: 'left'
},

crypto_qrcode_qrcode:{
  marginTop: 30,
  marginBottom: 15,
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
  lineHeight: 14.92,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
  fontStyle: 'italic'
},
copied:{
  color: Colors.green,
  fontSize: 14,
  lineHeight: 18,
  fontWeight: '600',
  fontFamily: 'Faktum-Medium',
  fontStyle:'italic',
},
v_tag_link_wrap:{
  flexDirection: 'row',
  alignItems: 'center',
  borderRadius: 12,
  overflow: 'hidden',
  padding: 0,
  marginLeft: 0,
  paddingTop: 8,
 justifyContent: 'space-between'
},
v_tag_link_middle2:{
  marginRight: 10,
},
v_tag_link_middle_text11:{
  marginLeft: 0,
  color: Colors.neutral,
  fontSize: 13,
  lineHeight: 18,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
  textAlign: 'left'
},
crypto_share_warning:{
  maxWidth: '80%',
  textAlign: 'center',
  marginBottom: 10,
  marginTop: 20,
  color: '#323232',
  fontSize: 12,
  lineHeight: 16,
  fontWeight: '400',
  fontFamily: 'Faktum-Regular',
},
qr_select_background:{
  width: '40%',
  height: 48,
  backgroundColor: Colors.green,
  borderRadius: 15,
  overflow: 'hidden',
},
deposittwo_main_middle_bank_wrap2:{
  flexDirection: 'row',
  width: '40%',
  alignItems: 'center',
  backgroundColor: Colors.white,
  height: 46,
  borderRadius: 12,
  paddingLeft: 10,
  shadowColor: Colors.gray,
  shadowOpacity: 0.5,
  shadowOffset: { width: 2, height: 4},
  shadowRadius: 10,
  elevation: 10,
  marginTop: -51,
  marginLeft: 10,
  borderColor: Colors.black,
  borderWidth:1,
},
})