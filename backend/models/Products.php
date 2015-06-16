<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property string $name
 * @property string $author
 * @property integer $price
 * @property string $edition
 * @property string $publisher
 * @property string $category
 */
class Products extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Products the static model class
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
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, author, price, edition, publisher, category', 'required'),
			array('price', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>200),
			array('author, publisher', 'length', 'max'=>100),
			array('edition, category', 'length', 'max'=>50),
                        array('image', 'file', 
                                'types'=>'gif, png ,jpg , jpeg', 
                                'maxSize'=>1024 * 1024 ,
                                'tooLarge'=>'The file was larger than 1MB. Please upload a smaller file.',
                                'wrongType'=>'Please upload only images in the format gif, png,jpg,jpeg',
                                'tooMany'=>'You can upload only 1 avatar'),
                    
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, author, price, edition, publisher, category', 'safe', 'on'=>'search'),
                        
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
                    'pid'=>array(self::HAS_ONE, 'Book','product_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'author' => 'Author',
			'price' => 'Price',
			'edition' => 'Edition',
			'publisher' => 'Publisher',
			'category' => 'Category',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('edition',$this->edition,true);
		$criteria->compare('publisher',$this->publisher,true);
		$criteria->compare('category',$this->category,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}