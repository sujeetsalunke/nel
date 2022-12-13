<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Galleries Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\MaterialsTable|\Cake\ORM\Association\BelongsTo $Materials
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\Gallery get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gallery newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gallery[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gallery|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gallery patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gallery[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gallery findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GalleriesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('galleries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Materials', [
            'foreignKey' => 'material_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->scalar('image')
                ->requirePresence('image', 'create')
                ->notEmpty('image');

        $validator
                ->integer('status')
                ->requirePresence('status', 'create')
                ->notEmpty('status');

        return $validator;
    }

//    public function uploadImage($image = null) {
//        $alias_name = '';
//        $img_name = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 5)), 0, 7);
//        $upload_path = "img/gallery";
//        if ($image['error'] == UPLOAD_ERR_OK) {
//            $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
//            if (strtolower($ext) == 'png' || strtolower($ext) == 'jpg' || strtolower($ext) == 'gif' || strtolower($ext) == 'ico') {
//                if (move_uploaded_file($image['tmp_name'], $upload_path . DS . $img_name . "." . $ext)) {
//                    $alias_name = $img_name . "." . $ext;
//                }
//            }
//        }
//
//        return $alias_name;
//    }

    public function uploadImage($image = null) {
        $upload_path = 'img/gallery';

        $upload_path_large = 'img/gallery/thumb';

        $upload_path_medium = 'img/gallery/435X610';

        $img_name = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 10)), 0, 7);
        $this->uploadImageSize($image, $img_name, $upload_path_large, 143, 137, true);

        $this->uploadImageSize($image, $img_name, $upload_path_medium, 497, 497, true);

        $ext = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));

        if (move_uploaded_file($image['tmp_name'], $upload_path . DS . $img_name . "." . $ext)) {
            $alias_name = $img_name . "." . $ext;
        }
        return $alias_name;
    }

    public function uploadImageSize($file, $filename, $path, $width, $height, $resize = FALSE) {

        if ($file['error'] == UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

            $img_up_path = $path . DS . $filename . "." . $ext;

            if ($resize && $ext != 'png') {

                //if ($resize) {
                $this->resizeImage($file['tmp_name'], $ext, $img_up_path, $width, $height, 100);
                //UploadComponent::resize_image($file['tmp_name'], $ext, $img_up_path, $width, $height, 100);
            } elseif ($resize && $ext == 'png') {

                $this->resizeImage($file, $ext, $img_up_path, $width, $height, 100);
            }
            return true;
        }
        return false;
    }

    public function resizeImage($destination, $ext = null, $img_up_path = null, $newWidth = false, $newHeight = false, $quality = 100) {

        if ($ext == 'png') {
            list($width, $height, $type) = getimagesize($destination['tmp_name']);
        } else {
            list($width, $height, $type) = getimagesize($destination);
        }
        $xscale = $width / 100;
        $yscale = $height / 100;


        if ($width > $newWidth && $height < $newHeight) {
            $new_width = $newWidth;
            $new_height = floor(($new_width * $height) / $width);
        } elseif ($width < $newWidth && $height > $newHeight) {
            $new_height = $newHeight;
            $new_width = floor(($new_height * $width) / $height);
        } elseif ($width > $newWidth && $height > $newHeight) {
            $new_width = $newWidth;
            $new_height = floor(($new_width * $height) / $width);

            $width1 = $new_width;
            $height1 = $new_height;

            $new_height = $newHeight;
            $new_width = floor(($new_height * $width1) / $height1);
        } else {
            $new_width = $width;
            $new_height = $height;
        }

        $imageResized = imagecreatetruecolor($new_width, $new_height);

        if ($ext == 'jpeg' || $ext == 'jpg') {
            $imageTmp = imagecreatefromjpeg($destination);
            @imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        } elseif ($ext == 'png') {
            imagealphablending($imageResized, false);
            imagesavealpha($imageResized, true);
            $imageTmp = @imagecreatefrompng($destination['tmp_name']);
            // debug($imageTmp);
            if (!$imageTmp) {
                $imageTmp = imagecreatefromjpeg($destination['tmp_name']);
            }
            @imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagepng($imageResized, $img_up_path, 9);
        } elseif ($ext == 'gif') {
            $imageTmp = imagecreatefromgif($destination);
            @imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        }
        if ($ext == 'jpeg' || $ext == 'jpg') {
            imagejpeg($imageResized, $img_up_path, 100);
        } elseif ($ext == 'png') {
            //imagepng($imageResized, $img_up_path, 9);
        } elseif ($ext == 'gif') {
            imagegif($imageResized, $img_up_path, 100);
        }
        return true;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['material_id'], 'Materials'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }

}
