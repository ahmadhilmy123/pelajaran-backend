const { Alumni } = require('../models');
const { Op } = require('sequelize');
const { validationResult } = require('express-validator');

class AlumniController {
  static async index(req, res) {
    try {
      const alumni = await Alumni.findAll();
      res.status(200).json({
        message: 'Get All Resource',
        data: alumni
      });
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  static async store(req, res) {
    try {
      const errors = validationResult(req);
      if (!errors.isEmpty()) {
        return res.status(422).json({
          message: 'All fields must be filled correctly',
          errors: errors.array()
        });
      }

      const alumni = await Alumni.create(req.body);
      res.status(201).json({
        message: 'Resource is added successfully',
        data: alumni
      });
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  static async update(req, res) {
    try {
      const alumni = await Alumni.findByPk(req.params.id);
      if (!alumni) {
        return res.status(404).json({
          message: 'Resource not found'
        });
      }

      await alumni.update(req.body);
      res.status(200).json({
        message: 'Resource is update successfully',
        data: alumni
      });
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  static async destroy(req, res) {
    try {
      const alumni = await Alumni.findByPk(req.params.id);
      if (!alumni) {
        return res.status(404).json({
          message: 'Resource not found'
        });
      }

      await alumni.destroy();
      res.status(200).json({
        message: 'Resource is delete successfully'
      });
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  static async show(req, res) {
    try {
      const alumni = await Alumni.findByPk(req.params.id);
      if (!alumni) {
        return res.status(404).json({
          message: 'Resource not found'
        });
      }

      res.status(200).json({
        message: 'Get Detail Resource',
        data: alumni
      });
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  static async search(req, res) {
    try {
      const alumni = await Alumni.findAll({
        where: {
          name: {
            [Op.like]: `%${req.query.name}%`
          }
        }
      });

      if (alumni.length === 0) {
        return res.status(404).json({
          message: 'Resource not found'
        });
      }

      res.status(200).json({
        message: 'Get searched resource',
        data: alumni
      });
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  static async getFreshGraduates(req, res) {
    try {
      const alumni = await Alumni.findAll({
        where: { status: 'fresh-graduate' }
      });

      res.status(200).json({
        message: 'Get fresh graduate resource',
        total: alumni.length,
        data: alumni
      });
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  static async getEmployed(req, res) {
    try {
      const alumni = await Alumni.findAll({
        where: { status: 'employed' }
      });

      res.status(200).json({
        message: 'Get employed resource',
        total: alumni.length,
        data: alumni
      });
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  static async getUnemployed(req, res) {
    try {
      const alumni = await Alumni.findAll({
        where: { status: 'unemployed' }
      });

      res.status(200).json({
        message: 'Get unemployed resource',
        total: alumni.length,
        data: alumni
      });
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }
}

module.exports = AlumniController;