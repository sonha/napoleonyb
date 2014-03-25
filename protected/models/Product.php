<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer  $id
 * @property integer  $categoryId
 * @property string   $name
 * @property string   $avatar
 * @property integer  $price
 * @property string   $dateCreated
 * @property string   $avatarUpload
 * @property integer  $status
 * @property integer  $home
 * @property integer  $feature
 * @property integer  $rank
 * @property string  $detail
 * @property string  $short_description
 * @property string  $description
 *
 * The followings are the available model relations:
 * @property Category $category
 */
class Product extends CActiveRecord
{
    public $avatarUpload;
    const NEW_PRODUCT = 1;
    const NEW_PRODUCT_TITLE = 'SẢN PHẨM MỚI';
    const FEATURE_PRODUCT = 2;
    const FEATURE_PRODUCT_TITLE = 'SẢN PHẨM NỔI BẬT';
    const BEST_SELLER = 3;
    const BEST_SELLER_TITLE = 'SẢN PHẨM BÁN NHIỀU NHẤT';

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Product the static model class
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
        return 'product';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('categoryId, name', 'required'),
            array('price, status, home, feature', 'numerical', 'integerOnly' => TRUE),
            array('name', 'length', 'max' => 255),
            array('rank', 'numerical', 'min' => 0, 'max' => 10, 'integerOnly' => TRUE),
            array('categoryId, short_description, description', 'safe'),
            array('avatarUpload', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => TRUE),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, categoryId, name, price, status, home, feature, rank, short_description, description', 'safe', 'on' => 'search'),
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
            'category' => array(self::BELONGS_TO, 'Category', 'categoryId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'categoryId' => 'Chuyên mục',
            'name' => 'Tên',
            'avatar' => 'Ảnh',
            'price' => 'Giá',
            'dateCreated' => 'Ngày tạo',
            'status' => 'Hiển thị',
            'home' => 'Trang chủ',
            'feature' => 'Đặc biệt',
            'rank' => 'Thứ tự',
            'detail' => 'Chi tiết',
            'short_description' => 'Mô tả ngắn',
            'description' => 'Mô tả',
        );
    }

    protected function beforeSave()
    {
        $this->avatarUpload = CUploadedFile::getInstance($this, 'avatar');
        if (isset($this->avatarUpload)) {
            $fileName = $this->avatarUpload->name;
            $uploadFolder = Yii::getPathOfAlias('webroot') . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . date('Y-m-d');
            if (!is_dir($uploadFolder)) {
                mkdir($uploadFolder, 0755, TRUE);
            }
            $uploadFile = $uploadFolder . DIRECTORY_SEPARATOR . $fileName;
            $this->avatarUpload->saveAs($uploadFile); //Upload file thong qua object CUploadedFile
            $this->avatar = '/upload/' . date('Y-m-d') . '/' . $fileName; //Lưu path vào csdl
        }
        return parent::beforeSave();
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
        $criteria->compare('categoryId', $this->categoryId);
        $criteria->compare('name', $this->name, TRUE);
        $criteria->compare('price', $this->price);
        $criteria->compare('status', $this->status);
        $criteria->compare('home', $this->home);
        $criteria->compare('feature', $this->feature);
        $criteria->compare('rank', $this->rank);
        $criteria->compare('detail', $this->detail);
        $criteria->compare('short_descriotion', $this->short_description);
        $criteria->compare('descriotion', $this->description);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'rank DESC,id DESC'
            ),
            'pagination' => array(
                'pageSize' => 30,
            ),
        ));
    }

    public static function getAllProduct()
    {
        $allProduct = Yii::app()->db->createCommand()
            ->select('*')
            ->from('product')
            ->queryAll();
        return $allProduct;
    }

    public static function getDetailProduct($id)
    {
        $detail = Yii::app()->db->createCommand()
            ->select('*')
            ->from('product')
            ->where('id=' . $id)
            ->queryRow();
        return $detail;
    }
}