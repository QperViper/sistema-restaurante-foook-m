from openpyxl import *
from customtkinter import *
from customtkinter import CTk, CTkFrame, CTkButton, CTkEntry, CTkImage, CTkLabel, CTkImage
from tkinter import *
from CTkMessagebox import CTkMessagebox
#from tkinter import ttk 
from subprocess import call
import subprocess
from PIL import ImageTk, Image

import conexion

from tkinter import simpledialog as sd, messagebox as mb

class Inicio (object):
    def __init__(self) -> None:
        self.ventana=CTk()
        self.datos = conexion.Registro_de_datos()
        self.fila1 = ''
        self.fila2 = '' 
        self.ventana.geometry("740x700")
        altura = self.ventana.winfo_reqheight()
        anchura = self.ventana.winfo_reqwidth()
        altura_pantalla = self.ventana.winfo_screenheight()
        anchura_pantalla = self.ventana.winfo_screenwidth()
        
        x = (anchura_pantalla // 3) - (anchura//4)
        y = (altura_pantalla//5) - (altura//4)
        self.ventana.geometry(f"+{x}+{y}")
        self.ventana.title("Food OK!")
        self.ventana.config(bg="gold")
        self.ventana.iconbitmap("C:\\FO_OK\\ico.ico")
        self.opciones()
        self.ventana.mainloop()
        
    

    
    def opciones(self):
        self.username = StringVar()
        self.password = StringVar()
        self.img2 = ImageTk.PhotoImage(Image.open("C:\\FO_OK\\FOODOK.PNG").resize((320,320)))   
        self.label = CTkLabel(self.ventana,text='', image = self.img2, bg_color="gold").pack(pady=30)

        self.usernameLabel = CTkLabel(self.ventana, text="Nombre", bg_color="gold", text_color="black").pack(pady=10)        
        self.usernameEntry = CTkEntry(self.ventana, textvariable=self.username, bg_color="gold").pack()

        self.passwordLabel = CTkLabel(self.ventana,text="Contraseña", bg_color="gold", text_color="black").pack(pady=10)
        self.passwordEntry = CTkEntry(self.ventana, textvariable=self.password, show='*', bg_color="gold").pack()
        self.btnEntrar = CTkButton(self.ventana, text="login", command=lambda:self.validar(), bg_color="gold", fg_color="gray30").pack(pady=10)
    
    def validar(self):
        user_entry = self.username.get()
        password_entry = self.password.get()       

        user_entry = str("'" + user_entry + "'")
        password_entry = str("'" + password_entry + "'")

        dato1 = self.datos.buscar_user(user_entry)
        dato2 = self.datos.busca_password(password_entry)

        self.fila1 = dato1
        self.fila2 = dato2
        
        if self.fila1 == self.fila2:
            if dato1 == []:
                CTkMessagebox(title='Error', message='ingrese contraseña')
                if dato2 == []:
                    CTkMessagebox(title='Error', message='ingrese rut')
                    if dato1 == [] and dato2 == []:
                        CTkMessagebox(title='Error', message='Usuario y Contraseña incorrectos')
                
            # else:

            #     if dato1==[] and dato2 !=[]:
            #         CTkMessagebox(title='Error', message='Usuario incorrecta')
                

            #     if dato1 !=[] and dato2==[]:
            #         CTkMessagebox(title='Error', message='Contraseña incorrecta')

            if dato1 !=[] and dato2 !=[]:
                self.ventana.destroy()
                call(["python","cajeronew/interfaz.py"])
    
Inicio()


