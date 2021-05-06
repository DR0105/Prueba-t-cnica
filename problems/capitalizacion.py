def capitalizar(entrada):
    salida = str(entrada[0].upper())
    jaja = ""
    for i in entrada[1 :len(entrada)]:
        salida = salida + i
    return salida

palabra = str(input("Ingrese la palabra a capitalizar: "))
print (capitalizar(palabra))