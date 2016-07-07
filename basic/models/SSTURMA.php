<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SSTURMA".
 *
 * @property integer $idTurma
 * @property string $nome
 *
 * @property SSUSUARIOTURMA[] $sSUSUARIOTURMAs
 * @property SSUSUARIO[] $idUsuarios
 * @property SSUSUARIOTURMAAULA[] $sSUSUARIOTURMAAULAs
 */
class SSTURMA extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SSTURMA';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTurma' => 'Id Turma',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSUSUARIOTURMAs()
    {
        return $this->hasMany(SSUSUARIOTURMA::className(), ['idTurma' => 'idTurma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuarios()
    {
        return $this->hasMany(SSUSUARIO::className(), ['idUsuario' => 'idUsuario'])->viaTable('SSUSUARIO_TURMA', ['idTurma' => 'idTurma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSUSUARIOTURMAAULAs()
    {
        return $this->hasMany(SSUSUARIOTURMAAULA::className(), ['idTurma' => 'idTurma']);
    }
}
