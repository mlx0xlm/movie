<?php
namespace Packt\Movie\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;

class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface{

    protected $customerSetupFactory;
    private $attributeSetFactory;
    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }

    public function upgrade(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $installer = $setup;
        $installer->startSetup();


        if (version_compare($context->getVersion(), '2.2.3', '<'))
        {
            $existTableName = $installer->getTable('magenest_old_table_name');
            $newTleTableName = $installer->getTable('magenest_new_table_name');
            if ($installer->tableExists($existTableName))
            {
                $installer->getConnection()->renameTable($existTableName, $newTleTableName);
            }
        }
        $installer->endSetup();
    }
    /*create table magenest movie*/
    private function creatTableMovie(SchemaSetupInterface $installer)
    {
        {
            $tableName = 'magenest_movie';

            $table = $installer->getConnection()->newTable(
                $installer->getTable($tableName)
            )->addColumn(
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
                )
                ->addColumn(
                    'director_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    11,
                    ['unsigned' => true, 'nullable' => false],
                    'director id'
                );
            $installer->getConnection()->createTable($table);
        }

    }
    /*create table magenest actor*/
    private function creatTableActor(SchemaSetupInterface $installer)
    {
        {
            $tableName = 'magenest_actor';

            $table = $installer->getConnection()->newTable(
                $installer->getTable($tableName)
                )->addColumn(
                'actor_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                'actor id'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false,'unsigned' => false],
                'name'
            );

            $installer->getConnection()->createTable($table);
        }

    }
    /*create table magenest movie actor*/
    private function createTableMagenestMovieActor(SchemaSetupInterface $installer)
    {
        {
            $tableName = 'Magenest_Movie_Actor';

            $table = $installer->getConnection()->newTable(
                $installer->getTable($tableName)
            )->addColumn(
            'movie_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            11,
                [ 'unsigned' => true, 'nullable' => false],
            'movie id'
        )->addColumn(
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            11,
                ['unsigned' => true, 'nullable' => false],
            'actor id'
        );

            $installer->getConnection()->createTable($table);
        }
    }

    /*add foreignkey movie_actor             note: dont run*/
    private function addForeignkey(SchemaSetupInterface $installer)
    {
        {
            $tableName = 'magenest_movie';

            $table = $installer->getConnection();
            $installer->getTable($tableName)
            ->addForeignKey(
                $installer->getFkName('magenest_movie', 'director_id', 'magenest_director', 'director_id'),
                    'director_id',
                $installer->getTable('magenest_movie'),
                    'director_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            );
        }
    }


    /** add a collum for table magenest_actor*/
    public function addCollumMagenestActor(SchemaSetupInterface $installer)
    {
        $tableName = 'magenest_actor';
        if ($installer->getConnection()->isTableExists($tableName) == true)
        {
            $installer->getConnection()->addColumn(
            $installer->getTable($tableName),
            'age',
            ['type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
             'length' => '11',
             'nullable' => true,
             'default' => '20',
             'comment' => 'age']);
        }
    }

    /* rename/change name collum ( example: table magenest_actor) */
    public function changeNameCollum(SchemaSetupInterface $installer)
    {
        $table='magenest_actor';
        if ($installer->getConnection()->tableColumnExists($table, 'age')){
            $installer->getConnection()->changeColumn(
                $installer->getTable($table),
                'age',
                'actor_age',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 12
                ]
            );
        }
    }

    /* rename/change name table */
    public function changeNameTable($oldTableName, $newTableName, $schemaName = null)
    {

        if (!$this->isTableExists($oldTableName, $schemaName)) {
            throw new \Zend_Db_Exception(sprintf('Table "%s" is not exists', $oldTableName));
        }
        if ($this->isTableExists($newTableName, $schemaName)) {
            throw new \Zend_Db_Exception(sprintf('Table "%s" already exists', $newTableName));
        }

        $oldTable = $this->_getTableName($oldTableName, $schemaName);
        $newTable = $this->_getTableName($newTableName, $schemaName);

        $query = sprintf('ALTER TABLE %s RENAME TO %s', $oldTable, $newTable);
        $this->query($query);

        $this->resetDdlCache($oldTableName, $schemaName);

        return true;
    }

}
