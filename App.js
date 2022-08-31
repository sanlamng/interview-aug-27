import { StatusBar } from 'expo-status-bar';
import * as React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import { Button, Image, KeyboardAvoidingView, StyleSheet, Text, TextInput, TouchableOpacity, View } from 'react-native';
import Login from './pages/login';
import Register from './pages/register';
import Dashboard from './pages/dashboard';

const Stack = createNativeStackNavigator()

export default function App() {
  return (
    <NavigationContainer>
      <Stack.Navigator>
        <Stack.Screen name="Login" component={Login} />
        <Stack.Screen name="Register" component={Register} />
        <Stack.Screen name="Dashboard" component={Dashboard}
          options={{
            headerLeft: () => (
              <Image
                style={styles.tinyLogo}
                source={require('./assets/menu.png')}
                onPress={alert('hello')}
              />
            ),
          }}
        />
      </Stack.Navigator>

    </NavigationContainer>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fafafa',
    alignItems: 'center',
    justifyContent: 'center',
  },

  textInput: {
    width: "100%",
    borderColor: "black",
    borderWidth: 1,
    marginBottom: 10,
    padding: 5
  },
  inputCont: {
    width: "80%"
  },

  btnCont: {
    backgroundColor: "#3b5998",
    padding: 5
  },

  tinyLogo: {
    marginRight: 10,
    width: 25,
  },
  btnText: {
    textAlign: "center",
    color: "#fff",
    fontWeight: "700"
  }
});
