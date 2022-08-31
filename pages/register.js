import { StatusBar } from 'expo-status-bar';
import * as React from 'react';
import axios from 'axios';

import { Button, KeyboardAvoidingView, StyleSheet, Text, TextInput, TouchableOpacity, View } from 'react-native';

export default function Register({ navigation }) {
    const [name, setName] = React.useState("");
    const [password, setPassword] = React.useState("");
    const [username, setUsername] = React.useState("");
    const [DOB, setDOB] = React.useState("");
    const [tel, setTel] = React.useState("");
    const [error, setError] = React.useState("");

    const createUser = async (username, password, name, DOB, tel) => {
        const req = await axios.post("https://ancient-chamber-37066.herokuapp.com/api/v1/user/register", {
            username,
            password,
            name,
            DOB,
            tel
        })

        const res = req.data;

        return res;
    }
    const handleSubmit = () => {
        const user = createUser(username, password, name, DOB, tel).then(res => {
            console.log(res);
            if (res.user._id) {
                return navigation.push("Login")
            }
        }).catch(e => {
            console.log(e)
            setError("something went wrong")
        });
    }
    return (
        <View style={styles.container}>
            <KeyboardAvoidingView style={styles.inputCont}>
                <TextInput style={styles.textInput} value={name} placeholder={'Enter Name'} onChangeText={name => setName(name)} />
                <TextInput style={styles.textInput} value={username} placeholder={'Enter username'} onChangeText={username => setUsername(username)} />
                <TextInput style={styles.textInput} value={DOB} placeholder={'Enter Date of birth'} onChangeText={DOB => setDOB(DOB)} />
                <TextInput style={styles.textInput} value={tel} placeholder={'Enter telephone Number'} onChangeText={tel => setTel(tel)} />
                <TextInput style={styles.textInput} value={password} placeholder={'Enter password'} secureTextEntry={true} onChangeText={password => setPassword(password)} />
                <TouchableOpacity>
                    <Button
                        style={{ backgroundColor: "#3b5998" }}
                        title="Register"
                        onPress={handleSubmit}
                    />
                </TouchableOpacity>
            </KeyboardAvoidingView>
            <StatusBar style="auto" />
        </View>
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
        padding: 5,

    },

    btnText: {
        textAlign: "center",
        color: "#fff",
        fontWeight: "700"
    }
});
