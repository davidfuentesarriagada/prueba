import tkinter as tk
from tkinter import messagebox
import qrcode
from PIL import Image, ImageTk

def generate_qr():
    url = url_entry.get()
    if not url:
        messagebox.showerror("Error", "Por favor, ingresa una URL.")
        return

    qr = qrcode.QRCode(
        version=1,
        error_correction=qrcode.constants.ERROR_CORRECT_L,
        box_size=10,
        border=4,
    )
    qr.add_data(url)
    qr.make(fit=True)
    img_qr = qr.make_image(fill='black', back_color='white')

    # Convertir a formato PIL Image para mostrar en Tkinter
    img = Image.new('RGB', (img_qr.pixel_size, img_qr.pixel_size), 'white')
    img.paste(img_qr)
    img = img.resize((250, 250), Image.Resampling.LANCZOS)
    img_tk = ImageTk.PhotoImage(img)

    # Mostrar el QR en la interfaz
    qr_label.config(image=img_tk)
    qr_label.image = img_tk  # Mantener una referencia

def clear():
    # Limpiar el campo de entrada y la imagen del código QR
    url_entry.delete(0, tk.END)
    qr_label.config(image='')
    qr_label.image = None

# Configuración de la ventana
window = tk.Tk()
window.title("Generador de Código QR")

# Creación de widgets
url_label = tk.Label(window, text="Ingresa la URL:")
url_label.pack(pady=10)

url_entry = tk.Entry(window, width=40)
url_entry.pack(pady=10)

generate_button = tk.Button(window, text="Generar Código QR", command=generate_qr)
generate_button.pack(pady=10)

clear_button = tk.Button(window, text="Limpiar", command=clear)
clear_button.pack(pady=10)

qr_label = tk.Label(window)
qr_label.pack(pady=10)

# Iniciar la interfaz
window.mainloop()

