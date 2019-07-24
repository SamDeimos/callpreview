'use strict'
var express = require('express');
var bodyParse = require('body-parser');
var app = express();

//archivos de ruta
var person_routes = require('./routes/person');

//middlewares
app.use(bodyParse.urlencoded({ extended: false }));
app.use(bodyParse.json());

//cors

//rutas
app.use('/api', person_routes);

//exportar 
module.exports = app;