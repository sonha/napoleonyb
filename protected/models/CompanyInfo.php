<?php

/**
 * This is the model class for table "sh_company_info".
 *
 * The followings are the available columns in table 'sh_company_info':
 * @property integer $id
 * @property string $name
 * @property string $address1
 * @property string $address2
 * @property string $phone1
 * @property string $phone2
 * @property string $email1
 * @property string $email2
 * @property string $website
 * @property string $facebook
 * @property string $desc1
 * @property string $desc2
 */
class CompanyInfo extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CompanyInfo the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'sh_company_info';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, address1, address2, phone1, phone2, email1, email2, website, facebook, desc1, desc2', 'length', 'max' => 500),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, address1, address2, phone1, phone2, email1, email2, website, facebook, desc1, desc2', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'email1' => 'Email1',
            'email2' => 'Email2',
            'website' => 'Website',
            'facebook' => 'Facebook',
            'desc1' => 'Desc1',
            'desc2' => 'Desc2',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('address1', $this->address1, true);
        $criteria->compare('address2', $this->address2, true);
        $criteria->compare('phone1', $this->phone1, true);
        $criteria->compare('phone2', $this->phone2, true);
        $criteria->compare('email1', $this->email1, true);
        $criteria->compare('email2', $this->email2, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('facebook', $this->facebook, true);
        $criteria->compare('desc1', $this->desc1, true);
        $criteria->compare('desc2', $this->desc2, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function getCompanyInfo()
    {
        $info = Yii::app()->db->createCommand()
            ->select('*')
            ->from('sh_company_info')
            ->where('id = 1')
            ->queryRow();
        return $info;
    }
}