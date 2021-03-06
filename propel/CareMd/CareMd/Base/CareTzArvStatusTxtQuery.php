<?php

namespace CareMd\CareMd\Base;

use \Exception;
use \PDO;
use CareMd\CareMd\CareTzArvStatusTxt as ChildCareTzArvStatusTxt;
use CareMd\CareMd\CareTzArvStatusTxtQuery as ChildCareTzArvStatusTxtQuery;
use CareMd\CareMd\Map\CareTzArvStatusTxtTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'care_tz_arv_status_txt' table.
 *
 *
 *
 * @method     ChildCareTzArvStatusTxtQuery orderByCareTzArvStatusTxtId($order = Criteria::ASC) Order by the care_tz_arv_status_txt_id column
 * @method     ChildCareTzArvStatusTxtQuery orderByCareTzArvVisit2Id($order = Criteria::ASC) Order by the care_tz_arv_visit_2_id column
 * @method     ChildCareTzArvStatusTxtQuery orderByCareTzArvStatusTxtCodeId($order = Criteria::ASC) Order by the care_tz_arv_status_txt_code_id column
 * @method     ChildCareTzArvStatusTxtQuery orderByOther($order = Criteria::ASC) Order by the other column
 *
 * @method     ChildCareTzArvStatusTxtQuery groupByCareTzArvStatusTxtId() Group by the care_tz_arv_status_txt_id column
 * @method     ChildCareTzArvStatusTxtQuery groupByCareTzArvVisit2Id() Group by the care_tz_arv_visit_2_id column
 * @method     ChildCareTzArvStatusTxtQuery groupByCareTzArvStatusTxtCodeId() Group by the care_tz_arv_status_txt_code_id column
 * @method     ChildCareTzArvStatusTxtQuery groupByOther() Group by the other column
 *
 * @method     ChildCareTzArvStatusTxtQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCareTzArvStatusTxtQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCareTzArvStatusTxtQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCareTzArvStatusTxtQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCareTzArvStatusTxtQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCareTzArvStatusTxtQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCareTzArvStatusTxt findOne(ConnectionInterface $con = null) Return the first ChildCareTzArvStatusTxt matching the query
 * @method     ChildCareTzArvStatusTxt findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCareTzArvStatusTxt matching the query, or a new ChildCareTzArvStatusTxt object populated from the query conditions when no match is found
 *
 * @method     ChildCareTzArvStatusTxt findOneByCareTzArvStatusTxtId(string $care_tz_arv_status_txt_id) Return the first ChildCareTzArvStatusTxt filtered by the care_tz_arv_status_txt_id column
 * @method     ChildCareTzArvStatusTxt findOneByCareTzArvVisit2Id(string $care_tz_arv_visit_2_id) Return the first ChildCareTzArvStatusTxt filtered by the care_tz_arv_visit_2_id column
 * @method     ChildCareTzArvStatusTxt findOneByCareTzArvStatusTxtCodeId(string $care_tz_arv_status_txt_code_id) Return the first ChildCareTzArvStatusTxt filtered by the care_tz_arv_status_txt_code_id column
 * @method     ChildCareTzArvStatusTxt findOneByOther(string $other) Return the first ChildCareTzArvStatusTxt filtered by the other column *

 * @method     ChildCareTzArvStatusTxt requirePk($key, ConnectionInterface $con = null) Return the ChildCareTzArvStatusTxt by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareTzArvStatusTxt requireOne(ConnectionInterface $con = null) Return the first ChildCareTzArvStatusTxt matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCareTzArvStatusTxt requireOneByCareTzArvStatusTxtId(string $care_tz_arv_status_txt_id) Return the first ChildCareTzArvStatusTxt filtered by the care_tz_arv_status_txt_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareTzArvStatusTxt requireOneByCareTzArvVisit2Id(string $care_tz_arv_visit_2_id) Return the first ChildCareTzArvStatusTxt filtered by the care_tz_arv_visit_2_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareTzArvStatusTxt requireOneByCareTzArvStatusTxtCodeId(string $care_tz_arv_status_txt_code_id) Return the first ChildCareTzArvStatusTxt filtered by the care_tz_arv_status_txt_code_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareTzArvStatusTxt requireOneByOther(string $other) Return the first ChildCareTzArvStatusTxt filtered by the other column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCareTzArvStatusTxt[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCareTzArvStatusTxt objects based on current ModelCriteria
 * @method     ChildCareTzArvStatusTxt[]|ObjectCollection findByCareTzArvStatusTxtId(string $care_tz_arv_status_txt_id) Return ChildCareTzArvStatusTxt objects filtered by the care_tz_arv_status_txt_id column
 * @method     ChildCareTzArvStatusTxt[]|ObjectCollection findByCareTzArvVisit2Id(string $care_tz_arv_visit_2_id) Return ChildCareTzArvStatusTxt objects filtered by the care_tz_arv_visit_2_id column
 * @method     ChildCareTzArvStatusTxt[]|ObjectCollection findByCareTzArvStatusTxtCodeId(string $care_tz_arv_status_txt_code_id) Return ChildCareTzArvStatusTxt objects filtered by the care_tz_arv_status_txt_code_id column
 * @method     ChildCareTzArvStatusTxt[]|ObjectCollection findByOther(string $other) Return ChildCareTzArvStatusTxt objects filtered by the other column
 * @method     ChildCareTzArvStatusTxt[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CareTzArvStatusTxtQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CareMd\CareMd\Base\CareTzArvStatusTxtQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CareMd\\CareMd\\CareTzArvStatusTxt', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCareTzArvStatusTxtQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCareTzArvStatusTxtQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCareTzArvStatusTxtQuery) {
            return $criteria;
        }
        $query = new ChildCareTzArvStatusTxtQuery();
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
     * @return ChildCareTzArvStatusTxt|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CareTzArvStatusTxtTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CareTzArvStatusTxtTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCareTzArvStatusTxt A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT care_tz_arv_status_txt_id, care_tz_arv_visit_2_id, care_tz_arv_status_txt_code_id, other FROM care_tz_arv_status_txt WHERE care_tz_arv_status_txt_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCareTzArvStatusTxt $obj */
            $obj = new ChildCareTzArvStatusTxt();
            $obj->hydrate($row);
            CareTzArvStatusTxtTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildCareTzArvStatusTxt|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildCareTzArvStatusTxtQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CareTzArvStatusTxtTableMap::COL_CARE_TZ_ARV_STATUS_TXT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCareTzArvStatusTxtQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CareTzArvStatusTxtTableMap::COL_CARE_TZ_ARV_STATUS_TXT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the care_tz_arv_status_txt_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCareTzArvStatusTxtId(1234); // WHERE care_tz_arv_status_txt_id = 1234
     * $query->filterByCareTzArvStatusTxtId(array(12, 34)); // WHERE care_tz_arv_status_txt_id IN (12, 34)
     * $query->filterByCareTzArvStatusTxtId(array('min' => 12)); // WHERE care_tz_arv_status_txt_id > 12
     * </code>
     *
     * @param     mixed $careTzArvStatusTxtId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCareTzArvStatusTxtQuery The current query, for fluid interface
     */
    public function filterByCareTzArvStatusTxtId($careTzArvStatusTxtId = null, $comparison = null)
    {
        if (is_array($careTzArvStatusTxtId)) {
            $useMinMax = false;
            if (isset($careTzArvStatusTxtId['min'])) {
                $this->addUsingAlias(CareTzArvStatusTxtTableMap::COL_CARE_TZ_ARV_STATUS_TXT_ID, $careTzArvStatusTxtId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($careTzArvStatusTxtId['max'])) {
                $this->addUsingAlias(CareTzArvStatusTxtTableMap::COL_CARE_TZ_ARV_STATUS_TXT_ID, $careTzArvStatusTxtId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareTzArvStatusTxtTableMap::COL_CARE_TZ_ARV_STATUS_TXT_ID, $careTzArvStatusTxtId, $comparison);
    }

    /**
     * Filter the query on the care_tz_arv_visit_2_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCareTzArvVisit2Id(1234); // WHERE care_tz_arv_visit_2_id = 1234
     * $query->filterByCareTzArvVisit2Id(array(12, 34)); // WHERE care_tz_arv_visit_2_id IN (12, 34)
     * $query->filterByCareTzArvVisit2Id(array('min' => 12)); // WHERE care_tz_arv_visit_2_id > 12
     * </code>
     *
     * @param     mixed $careTzArvVisit2Id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCareTzArvStatusTxtQuery The current query, for fluid interface
     */
    public function filterByCareTzArvVisit2Id($careTzArvVisit2Id = null, $comparison = null)
    {
        if (is_array($careTzArvVisit2Id)) {
            $useMinMax = false;
            if (isset($careTzArvVisit2Id['min'])) {
                $this->addUsingAlias(CareTzArvStatusTxtTableMap::COL_CARE_TZ_ARV_VISIT_2_ID, $careTzArvVisit2Id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($careTzArvVisit2Id['max'])) {
                $this->addUsingAlias(CareTzArvStatusTxtTableMap::COL_CARE_TZ_ARV_VISIT_2_ID, $careTzArvVisit2Id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareTzArvStatusTxtTableMap::COL_CARE_TZ_ARV_VISIT_2_ID, $careTzArvVisit2Id, $comparison);
    }

    /**
     * Filter the query on the care_tz_arv_status_txt_code_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCareTzArvStatusTxtCodeId(1234); // WHERE care_tz_arv_status_txt_code_id = 1234
     * $query->filterByCareTzArvStatusTxtCodeId(array(12, 34)); // WHERE care_tz_arv_status_txt_code_id IN (12, 34)
     * $query->filterByCareTzArvStatusTxtCodeId(array('min' => 12)); // WHERE care_tz_arv_status_txt_code_id > 12
     * </code>
     *
     * @param     mixed $careTzArvStatusTxtCodeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCareTzArvStatusTxtQuery The current query, for fluid interface
     */
    public function filterByCareTzArvStatusTxtCodeId($careTzArvStatusTxtCodeId = null, $comparison = null)
    {
        if (is_array($careTzArvStatusTxtCodeId)) {
            $useMinMax = false;
            if (isset($careTzArvStatusTxtCodeId['min'])) {
                $this->addUsingAlias(CareTzArvStatusTxtTableMap::COL_CARE_TZ_ARV_STATUS_TXT_CODE_ID, $careTzArvStatusTxtCodeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($careTzArvStatusTxtCodeId['max'])) {
                $this->addUsingAlias(CareTzArvStatusTxtTableMap::COL_CARE_TZ_ARV_STATUS_TXT_CODE_ID, $careTzArvStatusTxtCodeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareTzArvStatusTxtTableMap::COL_CARE_TZ_ARV_STATUS_TXT_CODE_ID, $careTzArvStatusTxtCodeId, $comparison);
    }

    /**
     * Filter the query on the other column
     *
     * Example usage:
     * <code>
     * $query->filterByOther('fooValue');   // WHERE other = 'fooValue'
     * $query->filterByOther('%fooValue%', Criteria::LIKE); // WHERE other LIKE '%fooValue%'
     * </code>
     *
     * @param     string $other The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCareTzArvStatusTxtQuery The current query, for fluid interface
     */
    public function filterByOther($other = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($other)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareTzArvStatusTxtTableMap::COL_OTHER, $other, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCareTzArvStatusTxt $careTzArvStatusTxt Object to remove from the list of results
     *
     * @return $this|ChildCareTzArvStatusTxtQuery The current query, for fluid interface
     */
    public function prune($careTzArvStatusTxt = null)
    {
        if ($careTzArvStatusTxt) {
            $this->addUsingAlias(CareTzArvStatusTxtTableMap::COL_CARE_TZ_ARV_STATUS_TXT_ID, $careTzArvStatusTxt->getCareTzArvStatusTxtId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the care_tz_arv_status_txt table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CareTzArvStatusTxtTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CareTzArvStatusTxtTableMap::clearInstancePool();
            CareTzArvStatusTxtTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CareTzArvStatusTxtTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CareTzArvStatusTxtTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CareTzArvStatusTxtTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CareTzArvStatusTxtTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CareTzArvStatusTxtQuery
