<?php

/**
 * This is the model class for table "posts".
 *
 * The followings are the available columns in table 'posts':
 * @property integer $id_post
 * @property string $title
 * @property string $content
 * @property string $post__url
 * @property string $image
 * @property string $file
 * @property string $date
 * @property integer $category
 * @property integer $post__depende
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Posts $postDepende
 * @property Posts[] $posts
 * @property PostCategories $category0
 */
class Posts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, post__url, date, category', 'required'),
			array('category, post__depende, status', 'numerical', 'integerOnly'=>true),
			array('title, post__url', 'length', 'max'=>255),
			array('image', 'length', 'max'=>155),
			array('file', 'length', 'max'=>250),
			array('content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_post, title, content, post__url, image, file, date, category, post__depende, status', 'safe', 'on'=>'search'),
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
			'postDepende' => array(self::BELONGS_TO, 'Posts', 'post__depende'),
			'posts' => array(self::HAS_MANY, 'Posts', 'post__depende'),
			'category0' => array(self::BELONGS_TO, 'PostCategories', 'category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_post' => 'Id Post',
			'title' => 'Title',
			'content' => 'Content',
			'post__url' => 'Post Url',
			'image' => 'Image',
			'file' => 'File',
			'date' => 'Date',
			'category' => 'Category',
			'post__depende' => 'Post Depende',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_post',$this->id_post);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('post__url',$this->post__url,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('post__depende',$this->post__depende);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Posts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
