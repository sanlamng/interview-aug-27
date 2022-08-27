const express = require("express");
const router = express.Router();
const { validateToken } = require("../Middlewares/AuthMiddleware");
const cors = require("cors");
const { getProducts } = require("../Controllers/api");

const dbOperation = require("../dbFiles/dbOperation");

router.get("/products", validateToken, getProducts);

module.exports = router;
