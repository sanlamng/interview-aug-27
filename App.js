// In App.js in a new project

import React, { Component, useState, useEffect } from 'react';
import { View, Text } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import Login from './src/screens/auth/Login';
import Dashboard from './src/screens/dashboard/Index';
import AsyncStorage from '@react-native-async-storage/async-storage';



const Stack = createNativeStackNavigator();

function App() {

  const [isLoggedIn, setIsLoggedIn] = useState(false);

  useEffect(() => {
    const checkJwt = async () => {
      const value = await AsyncStorage.getItem('UserJWTAysnc')
      if (value !== undefined && value !== null && value != ''){
        setIsLoggedIn(true)
      } else {
          
      }
    }
     checkJwt()
 },[]);

  return (
    <NavigationContainer>
      <Stack.Navigator
      screenOptions={{
        headerShown: false
      }}>
          {
            (!isLoggedIn)?
            <Stack.Screen name="Login" component={Login} />
            :
            <Stack.Screen name="Dashboard" component={Dashboard} />
          }

      </Stack.Navigator>
    </NavigationContainer>
  );
}

export default App;