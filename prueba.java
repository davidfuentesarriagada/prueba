class Camara {
    String marca;
    String modelo;
    boolean soporteFlash;
    List<Pelicula> peliculasCompatibles;
    String direccionServicioTecnico;
    // Constructor, getters y setters
}

class Pelicula {
    String marca;
    String nombre;
    int sensibilidadISO;
    String formato;
    // Constructor, getters y setters
}

class ServicioTecnico {
    String nombre;
    String direccion;
    // Constructor, getters y setters
}

class Alquiler {
    Estudiante estudiante;
    Camara camara;
    LocalDate fechaInicio;
    LocalDate fechaFin;
    // Constructor, métodos para manejar el alquiler
}

class Estudiante {
    String nombre;
    String idUniversitario;
    // Constructor, getters y setters
}
