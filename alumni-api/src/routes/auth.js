const express = require('express');
const router = express.Router();
const AuthController = require('../controllers/AuthController');
const { check } = require('express-validator');

const validateAuth = [
  check('email').isEmail(),
  check('password').isLength({ min: 6 }),
  check('username').notEmpty()
];

router.post('/register', validateAuth, AuthController.register);
router.post('/login', AuthController.login);

module.exports = router;