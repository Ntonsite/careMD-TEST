<?php

namespace CareMd\CareMd\Map;

use CareMd\CareMd\CareCategoryDisease;
use CareMd\CareMd\CareCategoryDiseaseQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'care_category_disease' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CareCategoryDiseaseTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CareMd.CareMd.Map.CareCategoryDiseaseTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'care_category_disease';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CareMd\\CareMd\\CareCategoryDisease';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CareMd.CareMd.CareCategoryDisease';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the nr field
     */
    const COL_NR = 'care_category_disease.nr';

    /**
     * the column name for the group_nr field
     */
    const COL_GROUP_NR = 'care_category_disease.group_nr';

    /**
     * the column name for the category field
     */
    const COL_CATEGORY = 'care_category_disease.category';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'care_category_disease.name';

    /**
     * the column name for the LD_var field
     */
    const COL_LD_VAR = 'care_category_disease.LD_var';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'care_category_disease.status';

    /**
     * the column name for the modify_id field
     */
    const COL_MODIFY_ID = 'care_category_disease.modify_id';

    /**
     * the column name for the modify_time field
     */
    const COL_MODIFY_TIME = 'care_category_disease.modify_time';

    /**
     * the column name for the create_id field
     */
    const COL_CREATE_ID = 'care_category_disease.create_id';

    /**
     * the column name for the create_time field
     */
    const COL_CREATE_TIME = 'care_category_disease.create_time';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Nr', 'GroupNr', 'Category', 'Name', 'LdVar', 'Status', 'ModifyId', 'ModifyTime', 'CreateId', 'CreateTime', ),
        self::TYPE_CAMELNAME     => array('nr', 'groupNr', 'category', 'name', 'ldVar', 'status', 'modifyId', 'modifyTime', 'createId', 'createTime', ),
        self::TYPE_COLNAME       => array(CareCategoryDiseaseTableMap::COL_NR, CareCategoryDiseaseTableMap::COL_GROUP_NR, CareCategoryDiseaseTableMap::COL_CATEGORY, CareCategoryDiseaseTableMap::COL_NAME, CareCategoryDiseaseTableMap::COL_LD_VAR, CareCategoryDiseaseTableMap::COL_STATUS, CareCategoryDiseaseTableMap::COL_MODIFY_ID, CareCategoryDiseaseTableMap::COL_MODIFY_TIME, CareCategoryDiseaseTableMap::COL_CREATE_ID, CareCategoryDiseaseTableMap::COL_CREATE_TIME, ),
        self::TYPE_FIELDNAME     => array('nr', 'group_nr', 'category', 'name', 'LD_var', 'status', 'modify_id', 'modify_time', 'create_id', 'create_time', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Nr' => 0, 'GroupNr' => 1, 'Category' => 2, 'Name' => 3, 'LdVar' => 4, 'Status' => 5, 'ModifyId' => 6, 'ModifyTime' => 7, 'CreateId' => 8, 'CreateTime' => 9, ),
        self::TYPE_CAMELNAME     => array('nr' => 0, 'groupNr' => 1, 'category' => 2, 'name' => 3, 'ldVar' => 4, 'status' => 5, 'modifyId' => 6, 'modifyTime' => 7, 'createId' => 8, 'createTime' => 9, ),
        self::TYPE_COLNAME       => array(CareCategoryDiseaseTableMap::COL_NR => 0, CareCategoryDiseaseTableMap::COL_GROUP_NR => 1, CareCategoryDiseaseTableMap::COL_CATEGORY => 2, CareCategoryDiseaseTableMap::COL_NAME => 3, CareCategoryDiseaseTableMap::COL_LD_VAR => 4, CareCategoryDiseaseTableMap::COL_STATUS => 5, CareCategoryDiseaseTableMap::COL_MODIFY_ID => 6, CareCategoryDiseaseTableMap::COL_MODIFY_TIME => 7, CareCategoryDiseaseTableMap::COL_CREATE_ID => 8, CareCategoryDiseaseTableMap::COL_CREATE_TIME => 9, ),
        self::TYPE_FIELDNAME     => array('nr' => 0, 'group_nr' => 1, 'category' => 2, 'name' => 3, 'LD_var' => 4, 'status' => 5, 'modify_id' => 6, 'modify_time' => 7, 'create_id' => 8, 'create_time' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('care_category_disease');
        $this->setPhpName('CareCategoryDisease');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CareMd\\CareMd\\CareCategoryDisease');
        $this->setPackage('CareMd.CareMd');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('nr', 'Nr', 'TINYINT', true, 3, null);
        $this->addColumn('group_nr', 'GroupNr', 'TINYINT', true, 3, 0);
        $this->addColumn('category', 'Category', 'VARCHAR', true, 35, '');
        $this->addColumn('name', 'Name', 'VARCHAR', true, 35, '');
        $this->addColumn('LD_var', 'LdVar', 'VARCHAR', true, 35, '');
        $this->addColumn('status', 'Status', 'VARCHAR', true, 25, '');
        $this->addColumn('modify_id', 'ModifyId', 'VARCHAR', true, 35, '');
        $this->addColumn('modify_time', 'ModifyTime', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('create_id', 'CreateId', 'VARCHAR', true, 35, '');
        $this->addColumn('create_time', 'CreateTime', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Nr', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Nr', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Nr', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Nr', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Nr', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Nr', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Nr', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? CareCategoryDiseaseTableMap::CLASS_DEFAULT : CareCategoryDiseaseTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (CareCategoryDisease object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CareCategoryDiseaseTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CareCategoryDiseaseTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CareCategoryDiseaseTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CareCategoryDiseaseTableMap::OM_CLASS;
            /** @var CareCategoryDisease $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CareCategoryDiseaseTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = CareCategoryDiseaseTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CareCategoryDiseaseTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CareCategoryDisease $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CareCategoryDiseaseTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(CareCategoryDiseaseTableMap::COL_NR);
            $criteria->addSelectColumn(CareCategoryDiseaseTableMap::COL_GROUP_NR);
            $criteria->addSelectColumn(CareCategoryDiseaseTableMap::COL_CATEGORY);
            $criteria->addSelectColumn(CareCategoryDiseaseTableMap::COL_NAME);
            $criteria->addSelectColumn(CareCategoryDiseaseTableMap::COL_LD_VAR);
            $criteria->addSelectColumn(CareCategoryDiseaseTableMap::COL_STATUS);
            $criteria->addSelectColumn(CareCategoryDiseaseTableMap::COL_MODIFY_ID);
            $criteria->addSelectColumn(CareCategoryDiseaseTableMap::COL_MODIFY_TIME);
            $criteria->addSelectColumn(CareCategoryDiseaseTableMap::COL_CREATE_ID);
            $criteria->addSelectColumn(CareCategoryDiseaseTableMap::COL_CREATE_TIME);
        } else {
            $criteria->addSelectColumn($alias . '.nr');
            $criteria->addSelectColumn($alias . '.group_nr');
            $criteria->addSelectColumn($alias . '.category');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.LD_var');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.modify_id');
            $criteria->addSelectColumn($alias . '.modify_time');
            $criteria->addSelectColumn($alias . '.create_id');
            $criteria->addSelectColumn($alias . '.create_time');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(CareCategoryDiseaseTableMap::DATABASE_NAME)->getTable(CareCategoryDiseaseTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CareCategoryDiseaseTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CareCategoryDiseaseTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CareCategoryDiseaseTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CareCategoryDisease or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CareCategoryDisease object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CareCategoryDiseaseTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CareMd\CareMd\CareCategoryDisease) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CareCategoryDiseaseTableMap::DATABASE_NAME);
            $criteria->add(CareCategoryDiseaseTableMap::COL_NR, (array) $values, Criteria::IN);
        }

        $query = CareCategoryDiseaseQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CareCategoryDiseaseTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CareCategoryDiseaseTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the care_category_disease table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CareCategoryDiseaseQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CareCategoryDisease or Criteria object.
     *
     * @param mixed               $criteria Criteria or CareCategoryDisease object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CareCategoryDiseaseTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CareCategoryDisease object
        }

        if ($criteria->containsKey(CareCategoryDiseaseTableMap::COL_NR) && $criteria->keyContainsValue(CareCategoryDiseaseTableMap::COL_NR) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CareCategoryDiseaseTableMap::COL_NR.')');
        }


        // Set the correct dbName
        $query = CareCategoryDiseaseQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CareCategoryDiseaseTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CareCategoryDiseaseTableMap::buildTableMap();