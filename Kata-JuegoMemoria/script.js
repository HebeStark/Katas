const contadorElemento = document.getElementById("contador");
let contador = 0;
let primeraCarta = null;
let segundaCarta = null;
let bloqueado = false;
let puntos = 0;
const marcador = document.querySelector(".marcador");
let segundos = 0;
let timer;
let juegoIniciado = false;

const tiempoElemento = document.getElementById("tiempo");

function iniciarTiempo(){

    timer = setInterval(() => {

        segundos++;
        tiempoElemento.textContent = segundos;

    }, 1000);

}

const imagenes = [
"arbol",
"celestial",
"cuerpos",
"estrella",
"luna",
"mago",
"ojoluna",
"sol"
];

const cartasJuego = [...imagenes, ...imagenes];

cartasJuego.sort(() => Math.random() - 0.5);

const tablero = document.getElementById("tablero");

cartasJuego.forEach(nombre => {

    const carta = document.createElement("div");

    carta.classList.add("carta");

    carta.dataset.nombre = nombre;

    tablero.appendChild(carta);

});


const cartas = document.querySelectorAll(".carta");

cartas.forEach(carta => {

    carta.addEventListener("click", () => {

        if (bloqueado) return;

        if (carta.classList.contains("girada")) return;

            if(!juegoIniciado){
                iniciarTiempo();
                juegoIniciado = true;
            }

        carta.classList.add("girada");

        const nombre = carta.dataset.nombre;

        carta.classList.add(nombre);

        contador++;
        contadorElemento.textContent = contador;

        if (!primeraCarta) {

            primeraCarta = carta;
            return;

        }

        segundaCarta = carta;

        comprobarPareja();

    });

});

function comprobarPareja() {

    const nombre1 = primeraCarta.dataset.nombre;
    const nombre2 = segundaCarta.dataset.nombre;

    if (nombre1 === nombre2) {

        puntos++;

        marcador.textContent = "Puntos: " + puntos;

        if(puntos === 8){

            clearInterval(timer);

            setTimeout(() => {
                alert("¡Felicidades ganaste el juego!");
            }, 300);

        }

        resetCartas();

    } else {

        bloqueado = true;

        setTimeout(() => {

            primeraCarta.classList.remove("girada", nombre1);
            segundaCarta.classList.remove("girada", nombre2);

            resetCartas();

        }, 1000);

    }

}

function resetCartas() {

    primeraCarta = null;
    segundaCarta = null;
    bloqueado = false;

}

const botonReiniciar = document.getElementById("reiniciar");

if(botonReiniciar){

    botonReiniciar.addEventListener("click", () => {

        location.reload();

    });

}