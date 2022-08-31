const User = require("../models/userModel");

exports.register = async (req, res) => {
    console.log(req.body);
    try {
        const user = new User({ ...req.body });
        await user.save();
        const token = await user.genAuthToken();
        await user.save();

        res.status(201).send({ user, token });
    } catch (e) {
        res.status(400).send(e);
    }
};

exports.login = async (req, res) => {
    console.log(req.body);
    try {
        const user = await User.validateUser(req.body.username, req.body.password);
        const token = await user.genAuthToken();
        res.send({ user, token });
    } catch (e) {
        res.status(400).send({ e: "Unable to login" });
    }
};