const express = require("express");
const router = new express.Router();
const catchAsyncError = require("../utils/error");
const productController = require("../controller/productController");
const auth = require("../middleware/auth");

// await cloudinary.uploader.upload(str, {})
router.get(
    "/api/v1/product/getAll/:id",
    productController.getAll,
    catchAsyncError
);

router.post(
    "/api/v1/product/create",
    productController.create,
    catchAsyncError
);

// router.post("/api/v1/user/login", userController.login);


module.exports = router;