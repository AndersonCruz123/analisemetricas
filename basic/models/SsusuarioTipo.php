<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SSUSUARIO_TIPO".
 *
 * @property integer $idUsuarioTipo
 * @property string $nome
 *
 * @property SSUSUARIO[] $sSUSUARIOs
 */
class SsusuarioTipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SSUSUARIO_TIPO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuarioTipo', 'nome'], 'required'],
            [['idUsuarioTipo'], 'integer'],
            [['nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuarioTipo' => 'Id Usuario Tipo',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSUSUARIOs()
    {
        return $this->hasMany(SSUSUARIO::className(), ['idUsuarioTipo' => 'idUsuarioTipo']);
    }
}
