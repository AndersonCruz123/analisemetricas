<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SSUSUARIO".
 *
 * @property integer $idUsuario
 * @property string $email
 * @property string $senha
 * @property string $nome
 * @property integer $professor
 * @property integer $idSala
 * @property integer $idPerfil
 * @property string $urlFotoPerfil
 * @property string $urlScreenshot
 * @property integer $paginaAtual
 * @property integer $sessaoAtiva
 * @property string $deviceId
 * @property string $accessToken
 * @property integer $accessTimestamp
 * @property string $genero
 * @property integer $idUsuarioTipo
 *
 * @property SSEVENTO[] $sSEVENTOs
 * @property SSGRUPO[] $sSGRUPOs
 * @property SSRECURSO[] $sSRECURSOs
 * @property SSPERFIL $idPerfil0
 * @property SSSALA $idSala0
 * @property SSUSUARIOTIPO $idUsuarioTipo0
 * @property SSUSUARIOGRUPO[] $sSUSUARIOGRUPOs
 * @property SSGRUPO[] $idGrupos
 * @property SSUSUARIOMATERIA[] $sSUSUARIOMATERIAs
 * @property SSMATERIA[] $idMaterias
 * @property SSUSUARIORECURSOCOMPARTILHAMENTO[] $sSUSUARIORECURSOCOMPARTILHAMENTOs
 * @property SSUSUARIOTURMA[] $sSUSUARIOTURMAs
 * @property SSTURMA[] $idTurmas
 * @property SSUSUARIOTURMAAULA[] $sSUSUARIOTURMAAULAs
 */
class Ssusuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SSUSUARIO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'senha', 'nome', 'genero', 'idUsuarioTipo'], 'required'],
            [['professor', 'idSala', 'idPerfil', 'paginaAtual', 'sessaoAtiva', 'accessTimestamp', 'idUsuarioTipo'], 'integer'],
            [['email'], 'string', 'max' => 500],
            [['senha', 'nome', 'urlFotoPerfil', 'urlScreenshot'], 'string', 'max' => 255],
            [['deviceId', 'accessToken'], 'string', 'max' => 100],
            [['genero'], 'string', 'max' => 5],
            [['idPerfil'], 'exist', 'skipOnError' => true, 'targetClass' => Ssperfil::className(), 'targetAttribute' => ['idPerfil' => 'idPerfil']],
            [['idSala'], 'exist', 'skipOnError' => true, 'targetClass' => Sssala::className(), 'targetAttribute' => ['idSala' => 'idSala']],
            [['idUsuarioTipo'], 'exist', 'skipOnError' => true, 'targetClass' => SsusuarioTipo::className(), 'targetAttribute' => ['idUsuarioTipo' => 'idUsuarioTipo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'email' => 'Email',
            'senha' => 'Senha',
            'nome' => 'Nome',
            'professor' => 'É um professor?',
            'idSala' => 'Id Sala',
            'idPerfil' => 'Id Perfil',
            'urlFotoPerfil' => 'Url Foto Perfil',
            'urlScreenshot' => 'Url Screenshot',
            'paginaAtual' => 'Pagina Atual',
            'sessaoAtiva' => 'Sessao Ativa',
            'deviceId' => 'Device ID',
            'accessToken' => 'Access Token',
            'accessTimestamp' => 'Access Timestamp',
            'genero' => 'Genero',
            'idUsuarioTipo' => 'Id Usuario Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSEVENTOs()
    {
        return $this->hasMany(SSEVENTO::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSGRUPOs()
    {
        return $this->hasMany(SSGRUPO::className(), ['idResponsavel' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSRECURSOs()
    {
        return $this->hasMany(SSRECURSO::className(), ['idResponsavel' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPerfil0()
    {
        return $this->hasOne(SSPERFIL::className(), ['idPerfil' => 'idPerfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSala0()
    {
        return $this->hasOne(SSSALA::className(), ['idSala' => 'idSala']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuarioTipo0()
    {
        return $this->hasOne(SSUSUARIOTIPO::className(), ['idUsuarioTipo' => 'idUsuarioTipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSUSUARIOGRUPOs()
    {
        return $this->hasMany(SSUSUARIOGRUPO::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrupos()
    {
        return $this->hasMany(SSGRUPO::className(), ['idGrupo' => 'idGrupo'])->viaTable('SSUSUARIO_GRUPO', ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSUSUARIOMATERIAs()
    {
        return $this->hasMany(SSUSUARIOMATERIA::className(), ['idProfessor' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMaterias()
    {
        return $this->hasMany(SSMATERIA::className(), ['idMateria' => 'idMateria'])->viaTable('SSUSUARIO_MATERIA', ['idProfessor' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSUSUARIORECURSOCOMPARTILHAMENTOs()
    {
        return $this->hasMany(SSUSUARIORECURSOCOMPARTILHAMENTO::className(), ['idUsuarioDestinatario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSUSUARIOTURMAs()
    {
        return $this->hasMany(SSUSUARIOTURMA::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTurmas()
    {
        return $this->hasMany(SSTURMA::className(), ['idTurma' => 'idTurma'])->viaTable('SSUSUARIO_TURMA', ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSSUSUARIOTURMAAULAs()
    {
        return $this->hasMany(SSUSUARIOTURMAAULA::className(), ['idUsuario' => 'idUsuario']);
    }
}
