<?php

namespace Model\Custom\NovumOverheid\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumOverheid\LifeEvent as ChildLifeEvent;
use Model\Custom\NovumOverheid\LifeEventQuery as ChildLifeEventQuery;
use Model\Custom\NovumOverheid\Map\LifeEventTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'life_event' table.
 *
 *
 *
 * @method     ChildLifeEventQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildLifeEventQuery orderByEventName($order = Criteria::ASC) Order by the event_name column
 * @method     ChildLifeEventQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildLifeEventQuery orderByEndpointId($order = Criteria::ASC) Order by the endpoint_id column
 * @method     ChildLifeEventQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildLifeEventQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildLifeEventQuery groupById() Group by the id column
 * @method     ChildLifeEventQuery groupByEventName() Group by the event_name column
 * @method     ChildLifeEventQuery groupByCode() Group by the code column
 * @method     ChildLifeEventQuery groupByEndpointId() Group by the endpoint_id column
 * @method     ChildLifeEventQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildLifeEventQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildLifeEventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLifeEventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLifeEventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLifeEventQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLifeEventQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLifeEventQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLifeEventQuery leftJoinLifeEventListener($relationAlias = null) Adds a LEFT JOIN clause to the query using the LifeEventListener relation
 * @method     ChildLifeEventQuery rightJoinLifeEventListener($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LifeEventListener relation
 * @method     ChildLifeEventQuery innerJoinLifeEventListener($relationAlias = null) Adds a INNER JOIN clause to the query using the LifeEventListener relation
 *
 * @method     ChildLifeEventQuery joinWithLifeEventListener($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the LifeEventListener relation
 *
 * @method     ChildLifeEventQuery leftJoinWithLifeEventListener() Adds a LEFT JOIN clause and with to the query using the LifeEventListener relation
 * @method     ChildLifeEventQuery rightJoinWithLifeEventListener() Adds a RIGHT JOIN clause and with to the query using the LifeEventListener relation
 * @method     ChildLifeEventQuery innerJoinWithLifeEventListener() Adds a INNER JOIN clause and with to the query using the LifeEventListener relation
 *
 * @method     \Model\Custom\NovumOverheid\LifeEventListenerQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildLifeEvent findOne(ConnectionInterface $con = null) Return the first ChildLifeEvent matching the query
 * @method     ChildLifeEvent findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLifeEvent matching the query, or a new ChildLifeEvent object populated from the query conditions when no match is found
 *
 * @method     ChildLifeEvent findOneById(int $id) Return the first ChildLifeEvent filtered by the id column
 * @method     ChildLifeEvent findOneByEventName(string $event_name) Return the first ChildLifeEvent filtered by the event_name column
 * @method     ChildLifeEvent findOneByCode(string $code) Return the first ChildLifeEvent filtered by the code column
 * @method     ChildLifeEvent findOneByEndpointId(string $endpoint_id) Return the first ChildLifeEvent filtered by the endpoint_id column
 * @method     ChildLifeEvent findOneByCreatedAt(string $created_at) Return the first ChildLifeEvent filtered by the created_at column
 * @method     ChildLifeEvent findOneByUpdatedAt(string $updated_at) Return the first ChildLifeEvent filtered by the updated_at column *

 * @method     ChildLifeEvent requirePk($key, ConnectionInterface $con = null) Return the ChildLifeEvent by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLifeEvent requireOne(ConnectionInterface $con = null) Return the first ChildLifeEvent matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLifeEvent requireOneById(int $id) Return the first ChildLifeEvent filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLifeEvent requireOneByEventName(string $event_name) Return the first ChildLifeEvent filtered by the event_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLifeEvent requireOneByCode(string $code) Return the first ChildLifeEvent filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLifeEvent requireOneByEndpointId(string $endpoint_id) Return the first ChildLifeEvent filtered by the endpoint_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLifeEvent requireOneByCreatedAt(string $created_at) Return the first ChildLifeEvent filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLifeEvent requireOneByUpdatedAt(string $updated_at) Return the first ChildLifeEvent filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLifeEvent[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLifeEvent objects based on current ModelCriteria
 * @method     ChildLifeEvent[]|ObjectCollection findById(int $id) Return ChildLifeEvent objects filtered by the id column
 * @method     ChildLifeEvent[]|ObjectCollection findByEventName(string $event_name) Return ChildLifeEvent objects filtered by the event_name column
 * @method     ChildLifeEvent[]|ObjectCollection findByCode(string $code) Return ChildLifeEvent objects filtered by the code column
 * @method     ChildLifeEvent[]|ObjectCollection findByEndpointId(string $endpoint_id) Return ChildLifeEvent objects filtered by the endpoint_id column
 * @method     ChildLifeEvent[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildLifeEvent objects filtered by the created_at column
 * @method     ChildLifeEvent[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildLifeEvent objects filtered by the updated_at column
 * @method     ChildLifeEvent[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LifeEventQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumOverheid\Base\LifeEventQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumOverheid\\LifeEvent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLifeEventQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLifeEventQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLifeEventQuery) {
            return $criteria;
        }
        $query = new ChildLifeEventQuery();
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
     * @return ChildLifeEvent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LifeEventTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LifeEventTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLifeEvent A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, event_name, code, endpoint_id, created_at, updated_at FROM life_event WHERE id = :p0';
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
            /** @var ChildLifeEvent $obj */
            $obj = new ChildLifeEvent();
            $obj->hydrate($row);
            LifeEventTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLifeEvent|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LifeEventTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LifeEventTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LifeEventTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LifeEventTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LifeEventTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the event_name column
     *
     * Example usage:
     * <code>
     * $query->filterByEventName('fooValue');   // WHERE event_name = 'fooValue'
     * $query->filterByEventName('%fooValue%', Criteria::LIKE); // WHERE event_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eventName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function filterByEventName($eventName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eventName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LifeEventTableMap::COL_EVENT_NAME, $eventName, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%', Criteria::LIKE); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LifeEventTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the endpoint_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEndpointId('fooValue');   // WHERE endpoint_id = 'fooValue'
     * $query->filterByEndpointId('%fooValue%', Criteria::LIKE); // WHERE endpoint_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $endpointId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function filterByEndpointId($endpointId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($endpointId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LifeEventTableMap::COL_ENDPOINT_ID, $endpointId, $comparison);
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
     * @return $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(LifeEventTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(LifeEventTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LifeEventTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(LifeEventTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(LifeEventTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LifeEventTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Model\Custom\NovumOverheid\LifeEventListener object
     *
     * @param \Model\Custom\NovumOverheid\LifeEventListener|ObjectCollection $lifeEventListener the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildLifeEventQuery The current query, for fluid interface
     */
    public function filterByLifeEventListener($lifeEventListener, $comparison = null)
    {
        if ($lifeEventListener instanceof \Model\Custom\NovumOverheid\LifeEventListener) {
            return $this
                ->addUsingAlias(LifeEventTableMap::COL_ID, $lifeEventListener->getLifeEventId(), $comparison);
        } elseif ($lifeEventListener instanceof ObjectCollection) {
            return $this
                ->useLifeEventListenerQuery()
                ->filterByPrimaryKeys($lifeEventListener->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLifeEventListener() only accepts arguments of type \Model\Custom\NovumOverheid\LifeEventListener or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LifeEventListener relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function joinLifeEventListener($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LifeEventListener');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'LifeEventListener');
        }

        return $this;
    }

    /**
     * Use the LifeEventListener relation LifeEventListener object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumOverheid\LifeEventListenerQuery A secondary query class using the current class as primary query
     */
    public function useLifeEventListenerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLifeEventListener($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LifeEventListener', '\Model\Custom\NovumOverheid\LifeEventListenerQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLifeEvent $lifeEvent Object to remove from the list of results
     *
     * @return $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function prune($lifeEvent = null)
    {
        if ($lifeEvent) {
            $this->addUsingAlias(LifeEventTableMap::COL_ID, $lifeEvent->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the life_event table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LifeEventTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LifeEventTableMap::clearInstancePool();
            LifeEventTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LifeEventTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LifeEventTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LifeEventTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LifeEventTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(LifeEventTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(LifeEventTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(LifeEventTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(LifeEventTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(LifeEventTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildLifeEventQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(LifeEventTableMap::COL_CREATED_AT);
    }

} // LifeEventQuery
