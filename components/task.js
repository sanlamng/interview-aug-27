import React from 'react'
import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View } from 'react-native';


const Task = ({ title }) => {
    return (
        <View style={styles.cont}>
            <View style={styles.wraper}>
                <View style={styles.square}></View>
                <Text>{title}</Text>
            </View>
            <View style={styles.circular}></View>
        </View>
    )
}

const styles = StyleSheet.create({
    wraper: {
        display: 'flex',
        flexDirection: 'row',
        alignItems: "center",
        width: 200,
    },

    square: {
        width: 24,
        height: 24,
        backgroundColor: "blue",
        marginRight: 10
    },

    cont: {
        backgroundColor: "#fafafa",
        padding: 10,
        marginTop: 10,
        marginBottom: 10,
        flexDirection: "row"
    }
})

export default Task