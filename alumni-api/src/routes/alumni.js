const express = require('express');
const router = express.Router();
const AlumniController = require('../controllers/AlumniController');
const auth = require('../middleware/auth');
const { check } = require('express-validator');

const validateAlumni = [
  check('name').notEmpty(),
  check('phone').notEmpty(),
  check('address').notEmpty(),
  check('graduation_year').isInt(),
  check('status').isIn(['fresh-graduate', 'employed', 'unemployed']),
];

router.use(auth); 

router.get('/', AlumniController.index);
router.post('/', validateAlumni, AlumniController.store);
router.put('/:id', AlumniController.update);
router.delete('/:id', AlumniController.destroy);
router.get('/:id', AlumniController.show);
router.get('/search/name', AlumniController.search);
router.get('/status/fresh-graduate', AlumniController.getFreshGraduates);
router.get('/status/employed', AlumniController.getEmployed);
router.get('/status/unemployed', AlumniController.getUnemployed);

module.exports = router;
