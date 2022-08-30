import React from 'react';
import { View, StatusBar, } from 'react-native';
import styles from '../screens/styles';
import { SafeAreaProvider, SafeAreaView} from 'react-native-safe-area-context';

export const CustomeStatusBar = ({backgroundColor, ...props}) => (
    <View style={[styles.statusBar2, { backgroundColor }]}>
      <SafeAreaView>
        <StatusBar translucent backgroundColor={backgroundColor} {...props} />
      </SafeAreaView>
      
    </View>
  );