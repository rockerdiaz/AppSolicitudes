<?php

/**
 * This is the model class for table "prioridades".
 *
 * The followings are the available columns in table 'prioridades':
 * @property integer $idPrioridad
 * @property string $descripcion
 * @property integer $tiempo_respuesta
 *
 * The followings are the available model relations:
 * @property Solicitudes[] $solicitudes
 */
class Prioridades extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Prioridades the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prioridades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, tiempo_respuesta', 'required'),
			array('tiempo_respuesta', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>65),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPrioridad, descripcion, tiempo_respuesta', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'solicitudes' => array(self::HAS_MANY, 'Solicitudes', 'idPrioridad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPrioridad' => 'Id Prioridad',
			'descripcion' => 'Descripcion',
			'tiempo_respuesta' => 'Tiempo Respuesta (en horas)',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idPrioridad',$this->idPrioridad);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('tiempo_respuesta',$this->tiempo_respuesta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @summary: Metodo que permite obtener los tipos de prioridades existentes en la tabla 'prioridades'
	 * @return Null
	 * @return [array] $datos [Array que contiene los datos necesarios para graficar]
	 */
	public function getTiposPrioridades(){
		$criteria = new CDbCriteria();
		$criteria->distinct = 'descripcion';

		$data_provider = new CActiveDataProvider($this, array('criteria'=>$criteria));

		return $data_provider->getData();
	}	
}