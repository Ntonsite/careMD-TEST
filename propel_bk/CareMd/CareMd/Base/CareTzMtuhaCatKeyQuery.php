<?php

namespace CareMd\CareMd\Base;

use \Exception;
use CareMd\CareMd\CareTzMtuhaCatKey as ChildCareTzMtuhaCatKey;
use CareMd\CareMd\CareTzMtuhaCatKeyQuery as ChildCareTzMtuhaCatKeyQuery;
use CareMd\CareMd\Map\CareTzMtuhaCatKeyTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'care_tz_mtuha_cat_key' table.
 *
 *
 *
 * @method     ChildCareTzMtuhaCatKeyQuery orderByCatId($order = Criteria::ASC) Order by the cat_ID column
 * @method     ChildCareTzMtuhaCatKeyQuery orderByIcd10Key($order = Criteria::ASC) Order by the icd10_key column
 *
 * @method     ChildCareTzMtuhaCatKeyQuery groupByCatId() Group by the cat_ID column
 * @method     ChildCareTzMtuhaCatKeyQuery groupByIcd10Key() Group by the icd10_key column
 *
 * @method     ChildCareTzMtuhaCatKeyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCareTzMtuhaCatKeyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCareTzMtuhaCatKeyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCareTzMtuhaCatKeyQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCareTzMtuhaCatKeyQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCareTzMtuhaCatKeyQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCareTzMtuhaCatKey findOne(ConnectionInterface $con = null) Return the first ChildCareTzMtuhaCatKey matching the query
 * @method     ChildCareTzMtuhaCatKey findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCareTzMtuhaCatKey matching the query, or a new ChildCareTzMtuhaCatKey object populated from the query conditions when no match is found
 *
 * @method     ChildCareTzMtuhaCatKey findOneByCatId(int $cat_ID) Return the first ChildCareTzMtuhaCatKey filtered by the cat_ID column
 * @method     ChildCareTzMtuhaCatKey findOneByIcd10Key(string $icd10_key) Return the first ChildCareTzMtuhaCatKey filtered by the icd10_key column *

 * @method     ChildCareTzMtuhaCatKey requirePk($key, ConnectionInterface $con = null) Return the ChildCareTzMtuhaCatKey by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareTzMtuhaCatKey requireOne(ConnectionInterface $con = null) Return the first ChildCareTzMtuhaCatKey matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCareTzMtuhaCatKey requireOneByCatId(int $cat_ID) Return the first ChildCareTzMtuhaCatKey filtered by the cat_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareTzMtuhaCatKey requireOneByIcd10Key(string $icd10_key) Return the first ChildCareTzMtuhaCatKey filtered by the icd10_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCareTzMtuhaCatKey[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCareTzMtuhaCatKey objects based on current ModelCriteria
 * @method     ChildCareTzMtuhaCatKey[]|ObjectCollection findByCatId(int $cat_ID) Return ChildCareTzMtuhaCatKey objects filtered by the cat_ID column
 * @method     ChildCareTzMtuhaCatKey[]|ObjectCollection findByIcd10Key(string $icd10_key) Return ChildCareTzMtuhaCatKey objects filtered by the icd10_key column
 * @method     ChildCareTzMtuhaCatKey[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CareTzMtuhaCatKeyQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CareMd\CareMd\Base\CareTzMtuhaCatKeyQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CareMd\\CareMd\\CareTzMtuhaCatKey', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCareTzMtuhaCatKeyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCareTzMtuhaCatKeyQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCareTzMtuhaCatKeyQuery) {
            return $criteria;
        }
        $query = new ChildCareTzMtuhaCatKeyQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCareTzMtuhaCatKey|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The CareTzMtuhaCatKey object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The CareTzMtuhaCatKey object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildCareTzMtuhaCatKeyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The CareTzMtuhaCatKey object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCareTzMtuhaCatKeyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The CareTzMtuhaCatKey object has no primary key');
    }

    /**
     * Filter the query on the cat_ID column
     *
     * Example usage:
     * <code>
     * $query->filterByCatId(1234); // WHERE cat_ID = 1234
     * $query->filterByCatId(array(12, 34)); // WHERE cat_ID IN (12, 34)
     * $query->filterByCatId(array('min' => 12)); // WHERE cat_ID > 12
     * </code>
     *
     * @param     mixed $catId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCareTzMtuhaCatKeyQuery The current query, for fluid interface
     */
    public function filterByCatId($catId = null, $comparison = null)
    {
        if (is_array($catId)) {
            $useMinMax = false;
            if (isset($catId['min'])) {
                $this->addUsingAlias(CareTzMtuhaCatKeyTableMap::COL_CAT_ID, $catId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($catId['max'])) {
                $this->addUsingAlias(CareTzMtuhaCatKeyTableMap::COL_CAT_ID, $catId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareTzMtuhaCatKeyTableMap::COL_CAT_ID, $catId, $comparison);
    }

    /**
     * Filter the query on the icd10_key column
     *
     * Example usage:
     * <code>
     * $query->filterByIcd10Key('fooValue');   // WHERE icd10_key = 'fooValue'
     * $query->filterByIcd10Key('%fooValue%', Criteria::LIKE); // WHERE icd10_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $icd10Key The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCareTzMtuhaCatKeyQuery The current query, for fluid interface
     */
    public function filterByIcd10Key($icd10Key = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($icd10Key)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareTzMtuhaCatKeyTableMap::COL_ICD10_KEY, $icd10Key, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCareTzMtuhaCatKey $careTzMtuhaCatKey Object to remove from the list of results
     *
     * @return $this|ChildCareTzMtuhaCatKeyQuery The current query, for fluid interface
     */
    public function prune($careTzMtuhaCatKey = null)
    {
        if ($careTzMtuhaCatKey) {
            throw new LogicException('CareTzMtuhaCatKey object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the care_tz_mtuha_cat_key table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CareTzMtuhaCatKeyTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CareTzMtuhaCatKeyTableMap::clearInstancePool();
            CareTzMtuhaCatKeyTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CareTzMtuhaCatKeyTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CareTzMtuhaCatKeyTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CareTzMtuhaCatKeyTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CareTzMtuhaCatKeyTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CareTzMtuhaCatKeyQuery
