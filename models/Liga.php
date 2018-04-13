<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "liga".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property int $qtde_participantes
 * @property string $participantes
 * @property bool $mata_mata
 * @property int $rodada_inicio
 * @property bool $ativa
 */
class Liga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'liga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'qtde_participantes', 'participantes', 'rodada_inicio'], 'required'],
            [['nome', 'descricao', 'participantes'], 'string'],
            [['qtde_participantes', 'rodada_inicio'], 'integer'],
            [['mata_mata', 'ativa'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'qtde_participantes' => 'Qtde Participantes',
            'participantes' => 'Participantes',
            'mata_mata' => 'Mata Mata',
            'rodada_inicio' => 'Rodada Inicio',
            'ativa' => 'Ativa',
        ];
    }
}
