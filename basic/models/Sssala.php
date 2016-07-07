<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SSSALA".
 *
 * @property integer $idSala
 * @property string $nome
 * @property integer $maximoAlunos
 * @property string $descricao
 *
 * @property SSAULA[] $sSAULAs
 * @property SSCAMERA[] $sSCAMERAs
 * @property SSUSUARIO[] $sSUSUARIOs
 */
class Sssala extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SSSALA';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['maximoAlunos'], 'integer'],
            [['nome', 'descricao'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSala' => 'Id Sala',
            'nome' => 'Nome',
            'maximoAlunos' => 'Maximo Alunos',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSAULAs()
    {
        return $this->hasMany(SSAULA::className(), ['idSala' => 'idSala']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSCAMERAs()
    {
        return $this->hasMany(SSCAMERA::className(), ['idSala' => 'idSala']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSUSUARIOs()
    {
        return $this->hasMany(SSUSUARIO::className(), ['idSala' => 'idSala']);
    }
}
