<?php
namespace Packt\Movie\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Create table 'movie'
         */
        $magenest_movie = $setup->getConnection()
            ->newTable($setup->getTable('magenest_movie'))
            ->addColumn(
                'movie_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'movie id'
            )
            ->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'movie name'
            )
            ->addColumn(
                'description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'description'
            )
            ->addColumn(
                'rating',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                5,
                ['unsigned' => true,'nullable' => false],
                'rating'
            );
        $setup->getConnection()->createTable($magenest_movie);

        $magenest_director = $setup->getConnection()
            ->newTable($setup->getTable('magenest_director'))
            ->addColumn(
                'director_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'director id'
            )
        ->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'movie id'
        );
        $setup->getConnection()->createTable($magenest_director);
        $magenest_actor = $setup->getConnection()
            ->newTable($setup->getTable('magenest_actor'))
            ->addColumn(
                'actor_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'actor id'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                'name'
            );
        $setup->getConnection()->createTable($magenest_actor);

        $magenest_movie_actor=$setup->getConnection()
            ->newTable($setup->getTable('magenest_movie_actor'))
            ->addColumn(
                'movie_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'movie id'
            )->addColumn(
                'actor_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'actor id'
            );
        $setup->getConnection()->createTable($magenest_movie_actor);
    }
}