<?php

namespace Model\Custom\NovumOverheid\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumOverheid\Verliespartner as ChildVerliespartner;
use Model\Custom\NovumOverheid\VerliespartnerQuery as ChildVerliespartnerQuery;
use Model\Custom\NovumOverheid\Map\VerliespartnerTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'verlies_partner' table.
 *
 *
 *
 * @method     ChildVerliespartnerQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildVerliespartnerQuery orderByOverledenPersoon($order = Criteria::ASC) Order by the overleden_persoon column
 * @method     ChildVerliespartnerQuery orderByDoodsoorzaak($order = Criteria::ASC) Order by the doodsoorzaak column
 * @method     ChildVerliespartnerQuery orderByDatum($order = Criteria::ASC) Order by the datum column
 * @method     ChildVerliespartnerQuery orderByDatasourceId($order = Criteria::ASC) Order by the datasource_id column
 * @method     ChildVerliespartnerQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildVerliespartnerQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildVerliespartnerQuery groupById() Group by the id column
 * @method     ChildVerliespartnerQuery groupByOverledenPersoon() Group by the overleden_persoon column
 * @method     ChildVerliespartnerQuery groupByDoodsoorzaak() Group by the doodsoorzaak column
 * @method     ChildVerliespartnerQuery groupByDatum() Group by the datum column
 * @method     ChildVerliespartnerQuery groupByDatasourceId() Group by the datasource_id column
 * @method     ChildVerliespartnerQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildVerliespartnerQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildVerliespartnerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildVerliespartnerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildVerliespartnerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildVerliespartnerQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildVerliespartnerQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildVerliespartnerQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildVerliespartner findOne(ConnectionInterface $con = null) Return the first ChildVerliespartner matching the query
 * @method     ChildVerliespartner findOneOrCreate(ConnectionInterface $con = null) Return the first ChildVerliespartner matching the query, or a new ChildVerliespartner object populated from the query conditions when no match is found
 *
 * @method     ChildVerliespartner findOneById(int $id) Return the first ChildVerliespartner filtered by the id column
 * @method     ChildVerliespartner findOneByOverledenPersoon(string $overleden_persoon) Return the first ChildVerliespartner filtered by the overleden_persoon column
 * @method     ChildVerliespartner findOneByDoodsoorzaak(string $doodsoorzaak) Return the first ChildVerliespartner filtered by the doodsoorzaak column
 * @method     ChildVerliespartner findOneByDatum(string $datum) Return the first ChildVerliespartner filtered by the datum column
 * @method     ChildVerliespartner findOneByDatasourceId(int $datasource_id) Return the first ChildVerliespartner filtered by the datasource_id column
 * @method     ChildVerliespartner findOneByCreatedAt(string $created_at) Return the first ChildVerliespartner filtered by the created_at column
 * @method     ChildVerliespartner findOneByUpdatedAt(string $updated_at) Return the first ChildVerliespartner filtered by the updated_at column *

 * @method     ChildVerliespartner requirePk($key, ConnectionInterface $con = null) Return the ChildVerliespartner by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVerliespartner requireOne(ConnectionInterface $con = null) Return the first ChildVerliespartner matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVerliespartner requireOneById(int $id) Return the first ChildVerliespartner filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVerliespartner requireOneByOverledenPersoon(string $overleden_persoon) Return the first ChildVerliespartner filtered by the overleden_persoon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVerliespartner requireOneByDoodsoorzaak(string $doodsoorzaak) Return the first ChildVerliespartner filtered by the doodsoorzaak column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVerliespartner requireOneByDatum(string $datum) Return the first ChildVerliespartner filtered by the datum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVerliespartner requireOneByDatasourceId(int $datasource_id) Return the first ChildVerliespartner filtered by the datasource_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVerliespartner requireOneByCreatedAt(string $created_at) Return the first ChildVerliespartner filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVerliespartner requireOneByUpdatedAt(string $updated_at) Return the first ChildVerliespartner filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVerliespartner[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildVerliespartner objects based on current ModelCriteria
 * @method     ChildVerliespartner[]|ObjectCollection findById(int $id) Return ChildVerliespartner objects filtered by the id column
 * @method     ChildVerliespartner[]|ObjectCollection findByOverledenPersoon(string $overleden_persoon) Return ChildVerliespartner objects filtered by the overleden_persoon column
 * @method     ChildVerliespartner[]|ObjectCollection findByDoodsoorzaak(string $doodsoorzaak) Return ChildVerliespartner objects filtered by the doodsoorzaak column
 * @method     ChildVerliespartner[]|ObjectCollection findByDatum(string $datum) Return ChildVerliespartner objects filtered by the datum column
 * @method     ChildVerliespartner[]|ObjectCollection findByDatasourceId(int $datasource_id) Return ChildVerliespartner objects filtered by the datasource_id column
 * @method     ChildVerliespartner[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildVerliespartner objects filtered by the created_at column
 * @method     ChildVerliespartner[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildVerliespartner objects filtered by the updated_at column
 * @method     ChildVerliespartner[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class VerliespartnerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumOverheid\Base\VerliespartnerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumOverheid\\Verliespartner', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildVerliespartnerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildVerliespartnerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildVerliespartnerQuery) {
            return $criteria;
        }
        $query = new ChildVerliespartnerQuery();
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
     * @return ChildVerliespartner|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(VerliespartnerTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = VerliespartnerTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildVerliespartner A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, overleden_persoon, doodsoorzaak, datum, datasource_id, created_at, updated_at FROM verlies_partner WHERE id = :p0';
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
            /** @var ChildVerliespartner $obj */
            $obj = new ChildVerliespartner();
            $obj->hydrate($row);
            VerliespartnerTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildVerliespartner|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VerliespartnerTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VerliespartnerTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(VerliespartnerTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(VerliespartnerTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VerliespartnerTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the overleden_persoon column
     *
     * Example usage:
     * <code>
     * $query->filterByOverledenPersoon('fooValue');   // WHERE overleden_persoon = 'fooValue'
     * $query->filterByOverledenPersoon('%fooValue%', Criteria::LIKE); // WHERE overleden_persoon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $overledenPersoon The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function filterByOverledenPersoon($overledenPersoon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($overledenPersoon)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VerliespartnerTableMap::COL_OVERLEDEN_PERSOON, $overledenPersoon, $comparison);
    }

    /**
     * Filter the query on the doodsoorzaak column
     *
     * Example usage:
     * <code>
     * $query->filterByDoodsoorzaak('fooValue');   // WHERE doodsoorzaak = 'fooValue'
     * $query->filterByDoodsoorzaak('%fooValue%', Criteria::LIKE); // WHERE doodsoorzaak LIKE '%fooValue%'
     * </code>
     *
     * @param     string $doodsoorzaak The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function filterByDoodsoorzaak($doodsoorzaak = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($doodsoorzaak)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VerliespartnerTableMap::COL_DOODSOORZAAK, $doodsoorzaak, $comparison);
    }

    /**
     * Filter the query on the datum column
     *
     * Example usage:
     * <code>
     * $query->filterByDatum('fooValue');   // WHERE datum = 'fooValue'
     * $query->filterByDatum('%fooValue%', Criteria::LIKE); // WHERE datum LIKE '%fooValue%'
     * </code>
     *
     * @param     string $datum The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function filterByDatum($datum = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($datum)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VerliespartnerTableMap::COL_DATUM, $datum, $comparison);
    }

    /**
     * Filter the query on the datasource_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDatasourceId(1234); // WHERE datasource_id = 1234
     * $query->filterByDatasourceId(array(12, 34)); // WHERE datasource_id IN (12, 34)
     * $query->filterByDatasourceId(array('min' => 12)); // WHERE datasource_id > 12
     * </code>
     *
     * @param     mixed $datasourceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function filterByDatasourceId($datasourceId = null, $comparison = null)
    {
        if (is_array($datasourceId)) {
            $useMinMax = false;
            if (isset($datasourceId['min'])) {
                $this->addUsingAlias(VerliespartnerTableMap::COL_DATASOURCE_ID, $datasourceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datasourceId['max'])) {
                $this->addUsingAlias(VerliespartnerTableMap::COL_DATASOURCE_ID, $datasourceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VerliespartnerTableMap::COL_DATASOURCE_ID, $datasourceId, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(VerliespartnerTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(VerliespartnerTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VerliespartnerTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(VerliespartnerTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(VerliespartnerTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VerliespartnerTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildVerliespartner $verliespartner Object to remove from the list of results
     *
     * @return $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function prune($verliespartner = null)
    {
        if ($verliespartner) {
            $this->addUsingAlias(VerliespartnerTableMap::COL_ID, $verliespartner->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the verlies_partner table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VerliespartnerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VerliespartnerTableMap::clearInstancePool();
            VerliespartnerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(VerliespartnerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(VerliespartnerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            VerliespartnerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            VerliespartnerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(VerliespartnerTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(VerliespartnerTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(VerliespartnerTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(VerliespartnerTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(VerliespartnerTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildVerliespartnerQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(VerliespartnerTableMap::COL_CREATED_AT);
    }

} // VerliespartnerQuery
