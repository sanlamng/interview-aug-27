const express = require("express");
const router = new express.Router();
const catchAsyncError = require("../utils/error");
const userController = require("../controller/userController");
const auth = require("../middleware/auth");

// await cloudinary.uploader.upload(str, {})
router.post(
    "/api/v1/user/register",
    userController.register,
    catchAsyncError
);

router.post("/api/v1/user/login", userController.login);


module.exports = router;
