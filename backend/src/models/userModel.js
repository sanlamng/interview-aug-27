const mongoose = require("../db/mongoose");
const validator = require("validator");
const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");

const userSchema = new mongoose.Schema(
    {
        name: {
            type: String,
            required: [true, "A user must have a name"],
            trim: true,
        },
        username: {
            type: String,
            unique: true,
            required: [true, "A user must have a username"],
            trim: true,
        },
        DOB: {
            type: String,
            required: [true, "A user must have a Date of Birth"],
        },
        tel: {
            type: String,
            required: [true, "A user must have a telephone number"],
        },
        password: {
            type: String,
            required: true,
        },

        tokens: [
            {
                token: {
                    type: String,
                    required: true,
                },
            },
        ],
    },
    {
        timestamps: true,
    }
);

userSchema.methods.genAuthToken = async function () {
    const user = this;
    const token = jwt.sign({ _id: user._id.toString() }, process.env.SECRET);
    user.tokens = user.tokens.concat({ token });
    await user.save();
    return token;
};

userSchema.statics.validateUser = async (username, password) => {
    const user = await User.findOne({ username });
    console.log(user);

    try {
        if (!user) {
            throw new Error("Unable to login");
        }

        const isMatch = await bcrypt.compare(password, user.password);

        if (!isMatch) {
            throw new Error("Unable to login");
        }
    } catch (e) {
        return e;
    }

    return user;
};

userSchema.pre("save", async function (next) {
    const user = this;

    if (user.isModified("password")) {
        user.password = await bcrypt.hash(user.password, 8);
    }

    next();
});

userSchema.methods.toJSON = function () {
    const user = this;
    const userObject = user.toObject();

    delete userObject.password;
    delete userObject.tokens;

    return userObject;
};
const User = mongoose.model("User", userSchema);

module.exports = User;
