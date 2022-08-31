import { StatusBar } from 'expo-status-bar';
import * as React from 'react';
import axios from 'axios';

import { Button, KeyboardAvoidingView, StyleSheet, Text, TextInput, TouchableOpacity, View } from 'react-native';

export default function Login({ navigation }) {
    const [username, setUsername] = React.useState("");
    const [password, setPassword] = React.useState("");
    const [error, setError] = React.useState("");

    const fetchUser = async (username, password) => {
        const req = await axios.post("https://ancient-chamber-37066.herokuapp.com/api/v1/user/login", {
            username,
            password,
        })

        const res = req.data;

        return res;
    }
    const handleSubmit = () => {

        const user = fetchUser(username, password).then(res => {
            console.log(res);
            if (res.user._id) {
                localStorage.setItem('token', res.user.token)
                return navigation.push("Dashboard", { user: res.user })
            }
        }).catch(e => {
            console.log(e)
            setError("Wrong Email or Password")
        });
        console.log(user);
    }
    return (

        <View style={styles.container}>
            <KeyboardAvoidingView style={styles.inputCont}>
                {error !== "" && <View>
                    <Text style={styles.error}>{error}</Text>
                </View>}
                <TextInput style={styles.textInput} value={username} onChangeText={username => setUsername(username)} placeholder={'Enter username'} />
                <TextInput style={styles.textInput} value={password} onChangeText={password => setPassword(password)} placeholder={'Enter password'} secureTextEntry={true} />
                <TouchableOpacity>

                    <Button
                        title="Login"
                        onPress={handleSubmit}
                    />
                </TouchableOpacity>
            </KeyboardAvoidingView>
            <View style={{ flexDirection: "row", marginTop: 10, alignItems: "center" }}>
                <Text> Don't have an account yet??</Text>
                <Text onPress={() => navigation.navigate('Register')}
                    style={{
                        color: "blue",
                        fontSize: 12,
                        marginLeft: 5
                    }}
                >Register</Text>

            </View>
            <StatusBar style="auto" />
        </View>
    );
}

const styles = StyleSheet.create({
    error: {
        backgroundColor: "red",
        textAlign: "center",
        color: "white",
        marginBottom: 10,
        padding: 5
    },
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
        padding: 5,

    },

    btnText: {
        textAlign: "center",
        color: "#fff",
        fontWeight: "700"
    }
});
