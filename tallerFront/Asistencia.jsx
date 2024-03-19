import { View, Text, TextInput, StyleSheet } from 'react-native'
import React from 'react'

export default function 
() {
  return (
    <View>
        <Text style={styles.title}>Asistencia</Text>
        <TextInput style={styles.input} placeholder="Nombre" />
        <TextInput style={styles.input} placeholder="Apellido" />
        <TextInput style={styles.input} placeholder="Edad" />
        <TextInput style={styles.input} placeholder="Cantidad de acompañantes" />
    </View>
  )
}

const styles = StyleSheet.create({
    input: {
        height: 40,
        margin: 12,
        borderWidth: 1,
        borderColor: 'black',
        padding: 10,
    },
    title: {
        fontSize: 20,
        fontWeight: 'bold',
    }
});  
