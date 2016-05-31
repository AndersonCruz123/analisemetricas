<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SSPERFIL".
 *
 * @property integer $idPerfil
 * @property string $nome
 * @property integer $ativo
 *
 * @property SSCOMPOSICAOPERFILAULA[] $sSCOMPOSICAOPERFILAULAs
 * @property SSAULA[] $idAulas
 * @property SSEVENTOCOMPILADO[] $sSEVENTOCOMPILADOs
 * @property SSUSUARIO[] $sSUSUARIOs
 */
class Ssperfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SSPERFIL';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['ativo'], 'integer'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPerfil' => 'Id Perfil',
            'nome' => 'Nome',
            'ativo' => 'Ativo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSCOMPOSICAOPERFILAULAs()
    {
        return $this->hasMany(SSCOMPOSICAOPERFILAULA::className(), ['idPerfil' => 'idPerfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAulas()
    {
        return $this->hasMany(SSAULA::className(), ['idAula' => 'idAula'])->viaTable('SSCOMPOSICAO_PERFIL_AULA', ['idPerfil' => 'idPerfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSEVENTOCOMPILADOs()
    {
        return $this->hasMany(SSEVENTOCOMPILADO::className(), ['idPerfil' => 'idPerfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSUSUARIOs()
    {
        return $this->hasMany(SSUSUARIO::className(), ['idPerfil' => 'idPerfil']);
    }
}
