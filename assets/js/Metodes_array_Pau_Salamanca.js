// Ejercicio 1
// Dado un array de números, utiliza .map() para multiplicar cada elemento del
// array por 2 y devolver un nuevo array con los resultados.
// const numbers = [1, 2, 3, 4, 5];

const numbers = [1, 2, 3, 4, 5];

const doubledNumbers = numbers.map(function (number) {
  return number * 2;
});

console.log(doubledNumbers);

//Ejercicio 2
// Dado un array que contiene cadenas de texto, utiliza .map() para devolver un
// nuevo array que contenga la longitud de cada cadena.
// const strings = ['hello', 'world', 'how', 'are', 'you'];

const strings = ['hello', 'world', 'how', 'are', 'you'];

const lengths = strings.map(function (str) {
  return str.length;
});

console.log(lengths);

//Ejercicio 3
// Dado un array de objetos que representan a personas, utiliza .map() para
// devolver un nuevo array que contenga las edades de cada persona.
// const people = [
// { name: 'Alice', age: 25 },
// { name: 'Bob', age: 30 },
// { name: 'Charlie', age: 35 },
// { name: 'Dave', age: 40 }
// ];

const people = [
    { name: 'Alice', age: 25 },
    { name: 'Bob', age: 30 },
    { name: 'Charlie', age: 35 },
    { name: 'Dave', age: 40 }
  ];
  

  const ages = people.map(function (person) {
    return person.age;
  });
  
  console.log(ages);

// Ejercicio 4
// Dado un array de objetos que representan a personas y una edad mínima,
// utiliza .map() para devolver un nuevo array que contenga solo las personas
// mayores de edad (edad mayor o igual a 18 años).
// const people = [
// { name: 'Alice', age: 25 },
// { name: 'Bob', age: 17 },
// { name: 'Charlie', age: 35 },
// { name: 'Dave', age: 12 }
// ];

const people = [
    { name: 'Alice', age: 25 },
    { name: 'Bob', age: 17 },
    { name: 'Charlie', age: 35 },
    { name: 'Dave', age: 12 }
  ];
  
  const adults = people.filter(function (person) {
    return person.age >= 18;
  });
  
  console.log(adults);



// Ejercicio 5
// Escribe una función maximo que tome un array de números y devuelva el
// número máximo del array. Utiliza .reduce para resolver este problema.

function maximo(numbers) {

    const max = numbers.reduce(function (accumulator, currentValue) {
      return Math.max(accumulator, currentValue);
    });
  
    return max;
  }
  
  const numbers = [5, 8, 2, 10, 3];
  const maxNumber = maximo(numbers);
  
  console.log(maxNumber);


// Ejercicio 6
// Escribe una función invertirCadena que tome un string y devuelva el mismo
// string con las palabras en orden inverso. Utiliza .reduce para resolver este
// problema.

function invertirCadena(str) {
    
    const reversedString = str.split(' ').reduce(function (accumulator, currentWord) {
      return currentWord + ' ' + accumulator;
    }, '').trim();
  
    return reversedString;
  }
  
  const inputString = 'Hola mundo, estoy practicando reducción';
  const invertedString = invertirCadena(inputString);
  
  console.log(invertedString);

// Ejercicio 7
// Escribe una función soloPares que tome un array de números y devuelva un
// array con solo los números pares del array original. Utiliza .filter para resolver
// este problema..

function soloPares(numbers) {
    
    const pares = numbers.filter(function (number) {
      return number % 2 === 0;
    });
  
    return pares;
  }
  
  const numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
  const numerosPares = soloPares(numeros);
  
  console.log(numerosPares);
  

// Ejercicio 8
// Escribe una función palabrasLargas que tome un array de palabras y un
// número n, y devuelva un array con solo las palabras del array original que
// tienen más de n caracteres. Utiliza .filter para resolver este problema.

function palabrasLargas(arrayDePalabras, n) {
    
    const palabrasLargasArray = arrayDePalabras.filter(function (palabra) {
      return palabra.length > n;
    });
  
    return palabrasLargasArray;
  }
  
  const palabras = ['gato', 'perro', 'elefante', 'jirafa', 'tigre'];
  const longitudMinima = 5;
  const palabrasLargasResultado = palabrasLargas(palabras, longitudMinima);
  
  console.log(palabrasLargasResultado);

// Ejercicio 9
// Escribe una función encontrarPalabra que tome un array de palabras y una
// palabra busqueda, y devuelva la primer palabra del array que sea igual a
// busqueda. Si no se encuentra ninguna palabra igual, la función debe devolver
// null. Utiliza .find para resolver este problema.

function encontrarPalabra(arrayDePalabras, busqueda) {
    
    const palabraEncontrada = arrayDePalabras.find(function (palabra) {
      return palabra === busqueda;
    });
  
    return palabraEncontrada !== undefined ? palabraEncontrada : null;
  }
  
  const palabras = ['gato', 'perro', 'elefante', 'jirafa', 'tigre'];
  const palabraBuscada = 'elefante';
  const resultado = encontrarPalabra(palabras, palabraBuscada);
  
  console.log(resultado);

// Ejercicio 10
// Escribe una función contarVocales que tome un string y devuelva la cantidad
// de vocales que hay en el string. Utiliza .reduce para resolver este problema.

function contarVocales(str) {
    const vocales = ['a', 'e', 'i', 'o', 'u'];
  
    const cantidadVocales = [...str].reduce(function (contador, letra) {
      if (vocales.includes(letra.toLowerCase())) {
        return contador + 1;
      } else {
        return contador;
      }
    }, 0);
  
    return cantidadVocales;
  }
  
  const texto = 'Hola, estoy contando vocales en este texto.';
  const resultado = contarVocales(texto);
  
  console.log(resultado);