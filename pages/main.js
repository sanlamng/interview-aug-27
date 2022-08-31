import { StatusBar } from 'expo-status-bar';
import * as React from 'react';
import axios from "axios";



import { Button, KeyboardAvoidingView, StyleSheet, Text, TextInput, TouchableOpacity, View } from 'react-native';

export default function Main({ route, navigation }) {
    const [prod, setProduct] = React.useState([])
    const { user } = route.params;

    const fetchProduct = async (id) => {
        const req = await axios.get("https://ancient-chamber-37066.herokuapp.com/api/v1/product/getAll/" + id)
        const res = req.data;
        console.log(res);
        return res;
    }
    React.useEffect(() => {
        console.log(user);
        fetchProduct(user._id).then(res => {
            console.log(res);
            return setProduct([...res.product])
        })
    }, [])

    const handleSubmit = () => {

    }
    return (

        <View style={styles.container}>
            <Text style={styles.heading}>Summary Of Assets</Text>
            {prod.map((prod, ind) => {
                return <View key={ind} >
                    <View style={styles.card}>
                        <Text style={styles.cardText}>{prod.product}</Text>
                        <Text style={styles.cardText}>{prod.amount}</Text>
                    </View>
                </View>
            })}
            <StatusBar style="auto" />
        </View>

    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: '#fafafa',
        padding: 20,
    },

    heading: {
        fontSize: 24,
        fontWeight: "600",
        marginBottom: 20
    },

    cardText: {
        color: "white",
        fontWeight: 18
    },

    card: {
        backgroundColor: "#3b5998",
        marginBottom: 20,
        padding: 15,
        borderRadius: 10
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
