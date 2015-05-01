<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.04.15
 * Time: 18:01
 */

namespace Acme\StoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
//use Sonata\AdminBundle\Show\ShowMapper;


class CategoryAdmin extends Admin
{
    /**
     * Конфигурация формы редактирования записи
     *
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Category title', 'attr' => array('style' => 'width:583px')))
            ->add('description', 'text', array('label' => 'About', 'attr' => array('class' => 'foreditor', 'style' => 'width:569px;height:200px;')))
            /*->add('products', 'sonata_type_collection',
                array(
                    'required' => false,
                    'by_reference' => false
                ),
                array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'allow_delete' => true
                ))*/;
    }

    /**
     * Конфигурация списка записей
     *
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('title', null, array('label' => 'Category title'))
            ->add('slug', null, array('label' => 'URL'));
    }

    /**
     * Поля, по которым производится поиск в списке записей
     *
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array('label' => 'Category title'))
            ->add('description');
    }


}
