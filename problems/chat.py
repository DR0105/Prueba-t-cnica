def chat (entrada):
    i = 0
    palabra = "hHoOlLaA"
    if entrada[0] != 'H' and entrada[0] != 'h':
        return False
    else:
        estado = 'h'
        while i <len(entrada):
            if entrada [i] not in palabra:
                return False
            if entrada[i] == 'H' or entrada[i] =='h' and (estado =='h'):
                estado = 'h'
            elif entrada[i] == 'O' or entrada[i] == 'o'and (estado =='h' or estado == 'o'):
                estado = 'o'
            elif entrada[i] == 'L' or entrada[i] == 'l' and (estado == 'o' or estado == 'l'):
                estado ='l'
            elif entrada[i] == 'A' or 'a' and (estado == 'l' or estado == 'a'):
                estado = 'a'
            else:
                estado = "incorrecto"
                return False
            i+=1
    if (estado=='a'):
        return True

saludo = str(input("Ingrese un saludo: "))
print(chat(saludo))