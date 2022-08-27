const express = require("express");
const router = express.Router();
const cors = require("cors");
const { validateToken } = require("../Middlewares/AuthMiddleware");

const dbOperation = require("../dbFiles/dbOperation");
const {
  createUserValidation,
  createProduct,
} = require("../Controllers/create");

router.post("/validation", createUserValidation);
router.post("/create-product", validateToken, createProduct);

module.exports = router;
