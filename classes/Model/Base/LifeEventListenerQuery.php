<?php

namespace Model\Custom\NovumOverheid\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumOverheid\LifeEventListener as ChildLifeEventListener;
use Model\Custom\NovumOverheid\LifeEventListenerQuery as ChildLifeEventListenerQuery;
use Model\Custom\NovumOverheid\Map\LifeEventListenerTableMap;
use Model\System\DataSourceEndpoint;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'life_event_listener' table.
 *
 *
 *
 * @method     ChildLifeEventListenerQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildLifeEventListenerQuery orderByLifeEventId($order = Criteria::ASC) Order by the life_event_id column
 * @method     ChildLifeEventListenerQuery orderByDatasourceEndpointId($order = Criteria::ASC) Order by the datasource_endpoint_id column
 * @method     ChildLifeEventListenerQuery orderByMessageTranslationId($order = Criteria::ASC) Order by the message_translation_id column
 * @method     ChildLifeEventListenerQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildLifeEventListenerQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildLifeEventListenerQuery groupById() Group by the id column
 * @method     ChildLifeEventListenerQuery groupByLifeEventId() Group by the life_event_id column
 * @method     ChildLifeEventListenerQuery groupByDatasourceEndpointId() Group by the datasource_endpoint_id column
 * @method     ChildLifeEventListenerQuery groupByMessageTranslationId() Group by the message_translation_id column
 * @method     ChildLifeEventListenerQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildLifeEventListenerQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildLifeEventListenerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLifeEventListenerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLifeEventListenerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLifeEventListenerQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLifeEventListenerQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLifeEventListenerQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLifeEventListenerQuery leftJoinLifeEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the LifeEvent relation
 * @method     ChildLifeEventListenerQuery rightJoinLifeEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LifeEvent relation
 * @method     ChildLifeEventListenerQuery innerJoinLifeEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the LifeEvent relation
 *
 * @method     ChildLifeEventListenerQuery joinWithLifeEvent($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the LifeEvent relation
 *
 * @method     ChildLifeEventListenerQuery leftJoinWithLifeEvent() Adds a LEFT JOIN clause and with to the query using the LifeEvent relation
 * @method     ChildLifeEventListenerQuery rightJoinWithLifeEvent() Adds a RIGHT JOIN clause and with to the query using the LifeEvent relation
 * @method     ChildLifeEventListenerQuery innerJoinWithLifeEvent() Adds a INNER JOIN clause and with to the query using the LifeEvent relation
 *
 * @method     ChildLifeEventListenerQuery leftJoinDataSourceEndpoint($relationAlias = null) Adds a LEFT JOIN clause to the query using the DataSourceEndpoint relation
 * @method     ChildLifeEventListenerQuery rightJoinDataSourceEndpoint($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DataSourceEndpoint relation
 * @method     ChildLifeEventListenerQuery innerJoinDataSourceEndpoint($relationAlias = null) Adds a INNER JOIN clause to the query using the DataSourceEndpoint relation
 *
 * @method     ChildLifeEventListenerQuery joinWithDataSourceEndpoint($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DataSourceEndpoint relation
 *
 * @method     ChildLifeEventListenerQuery leftJoinWithDataSourceEndpoint() Adds a LEFT JOIN clause and with to the query using the DataSourceEndpoint relation
 * @method     ChildLifeEventListenerQuery rightJoinWithDataSourceEndpoint() Adds a RIGHT JOIN clause and with to the query using the DataSourceEndpoint relation
 * @method     ChildLifeEventListenerQuery innerJoinWithDataSourceEndpoint() Adds a INNER JOIN clause and with to the query using the DataSourceEndpoint relation
 *
 * @method     ChildLifeEventListenerQuery leftJoinMessageTranslation($relationAlias = null) Adds a LEFT JOIN clause to the query using the MessageTranslation relation
 * @method     ChildLifeEventListenerQuery rightJoinMessageTranslation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MessageTranslation relation
 * @method     ChildLifeEventListenerQuery innerJoinMessageTranslation($relationAlias = null) Adds a INNER JOIN clause to the query using the MessageTranslation relation
 *
 * @method     ChildLifeEventListenerQuery joinWithMessageTranslation($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MessageTranslation relation
 *
 * @method     ChildLifeEventListenerQuery leftJoinWithMessageTranslation() Adds a LEFT JOIN clause and with to the query using the MessageTranslation relation
 * @method     ChildLifeEventListenerQuery rightJoinWithMessageTranslation() Adds a RIGHT JOIN clause and with to the query using the MessageTranslation relation
 * @method     ChildLifeEventListenerQuery innerJoinWithMessageTranslation() Adds a INNER JOIN clause and with to the query using the MessageTranslation relation
 *
 * @method     \Model\Custom\NovumOverheid\LifeEventQuery|\Model\System\DataSourceEndpointQuery|\Model\Custom\NovumOverheid\MessageTranslationQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildLifeEventListener findOne(ConnectionInterface $con = null) Return the first ChildLifeEventListener matching the query
 * @method     ChildLifeEventListener findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLifeEventListener matching the query, or a new ChildLifeEventListener object populated from the query conditions when no match is found
 *
 * @method     ChildLifeEventListener findOneById(int $id) Return the first ChildLifeEventListener filtered by the id column
 * @method     ChildLifeEventListener findOneByLifeEventId(int $life_event_id) Return the first ChildLifeEventListener filtered by the life_event_id column
 * @method     ChildLifeEventListener findOneByDatasourceEndpointId(int $datasource_endpoint_id) Return the first ChildLifeEventListener filtered by the datasource_endpoint_id column
 * @method     ChildLifeEventListener findOneByMessageTranslationId(int $message_translation_id) Return the first ChildLifeEventListener filtered by the message_translation_id column
 * @method     ChildLifeEventListener findOneByCreatedAt(string $created_at) Return the first ChildLifeEventListener filtered by the created_at column
 * @method     ChildLifeEventListener findOneByUpdatedAt(string $updated_at) Return the first ChildLifeEventListener filtered by the updated_at column *

 * @method     ChildLifeEventListener requirePk($key, ConnectionInterface $con = null) Return the ChildLifeEventListener by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLifeEventListener requireOne(ConnectionInterface $con = null) Return the first ChildLifeEventListener matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLifeEventListener requireOneById(int $id) Return the first ChildLifeEventListener filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLifeEventListener requireOneByLifeEventId(int $life_event_id) Return the first ChildLifeEventListener filtered by the life_event_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLifeEventListener requireOneByDatasourceEndpointId(int $datasource_endpoint_id) Return the first ChildLifeEventListener filtered by the datasource_endpoint_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLifeEventListener requireOneByMessageTranslationId(int $message_translation_id) Return the first ChildLifeEventListener filtered by the message_translation_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLifeEventListener requireOneByCreatedAt(string $created_at) Return the first ChildLifeEventListener filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLifeEventListener requireOneByUpdatedAt(string $updated_at) Return the first ChildLifeEventListener filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLifeEventListener[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLifeEventListener objects based on current ModelCriteria
 * @method     ChildLifeEventListener[]|ObjectCollection findById(int $id) Return ChildLifeEventListener objects filtered by the id column
 * @method     ChildLifeEventListener[]|ObjectCollection findByLifeEventId(int $life_event_id) Return ChildLifeEventListener objects filtered by the life_event_id column
 * @method     ChildLifeEventListener[]|ObjectCollection findByDatasourceEndpointId(int $datasource_endpoint_id) Return ChildLifeEventListener objects filtered by the datasource_endpoint_id column
 * @method     ChildLifeEventListener[]|ObjectCollection findByMessageTranslationId(int $message_translation_id) Return ChildLifeEventListener objects filtered by the message_translation_id column
 * @method     ChildLifeEventListener[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildLifeEventListener objects filtered by the created_at column
 * @method     ChildLifeEventListener[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildLifeEventListener objects filtered by the updated_at column
 * @method     ChildLifeEventListener[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LifeEventListenerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumOverheid\Base\LifeEventListenerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumOverheid\\LifeEventListener', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLifeEventListenerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLifeEventListenerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLifeEventListenerQuery) {
            return $criteria;
        }
        $query = new ChildLifeEventListenerQuery();
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
     * @return ChildLifeEventListener|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LifeEventListenerTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LifeEventListenerTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLifeEventListener A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, life_event_id, datasource_endpoint_id, message_translation_id, created_at, updated_at FROM life_event_listener WHERE id = :p0';
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
            /** @var ChildLifeEventListener $obj */
            $obj = new ChildLifeEventListener();
            $obj->hydrate($row);
            LifeEventListenerTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLifeEventListener|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LifeEventListenerTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LifeEventListenerTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LifeEventListenerTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LifeEventListenerTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LifeEventListenerTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the life_event_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLifeEventId(1234); // WHERE life_event_id = 1234
     * $query->filterByLifeEventId(array(12, 34)); // WHERE life_event_id IN (12, 34)
     * $query->filterByLifeEventId(array('min' => 12)); // WHERE life_event_id > 12
     * </code>
     *
     * @see       filterByLifeEvent()
     *
     * @param     mixed $lifeEventId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function filterByLifeEventId($lifeEventId = null, $comparison = null)
    {
        if (is_array($lifeEventId)) {
            $useMinMax = false;
            if (isset($lifeEventId['min'])) {
                $this->addUsingAlias(LifeEventListenerTableMap::COL_LIFE_EVENT_ID, $lifeEventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lifeEventId['max'])) {
                $this->addUsingAlias(LifeEventListenerTableMap::COL_LIFE_EVENT_ID, $lifeEventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LifeEventListenerTableMap::COL_LIFE_EVENT_ID, $lifeEventId, $comparison);
    }

    /**
     * Filter the query on the datasource_endpoint_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDatasourceEndpointId(1234); // WHERE datasource_endpoint_id = 1234
     * $query->filterByDatasourceEndpointId(array(12, 34)); // WHERE datasource_endpoint_id IN (12, 34)
     * $query->filterByDatasourceEndpointId(array('min' => 12)); // WHERE datasource_endpoint_id > 12
     * </code>
     *
     * @see       filterByDataSourceEndpoint()
     *
     * @param     mixed $datasourceEndpointId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function filterByDatasourceEndpointId($datasourceEndpointId = null, $comparison = null)
    {
        if (is_array($datasourceEndpointId)) {
            $useMinMax = false;
            if (isset($datasourceEndpointId['min'])) {
                $this->addUsingAlias(LifeEventListenerTableMap::COL_DATASOURCE_ENDPOINT_ID, $datasourceEndpointId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datasourceEndpointId['max'])) {
                $this->addUsingAlias(LifeEventListenerTableMap::COL_DATASOURCE_ENDPOINT_ID, $datasourceEndpointId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LifeEventListenerTableMap::COL_DATASOURCE_ENDPOINT_ID, $datasourceEndpointId, $comparison);
    }

    /**
     * Filter the query on the message_translation_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMessageTranslationId(1234); // WHERE message_translation_id = 1234
     * $query->filterByMessageTranslationId(array(12, 34)); // WHERE message_translation_id IN (12, 34)
     * $query->filterByMessageTranslationId(array('min' => 12)); // WHERE message_translation_id > 12
     * </code>
     *
     * @see       filterByMessageTranslation()
     *
     * @param     mixed $messageTranslationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function filterByMessageTranslationId($messageTranslationId = null, $comparison = null)
    {
        if (is_array($messageTranslationId)) {
            $useMinMax = false;
            if (isset($messageTranslationId['min'])) {
                $this->addUsingAlias(LifeEventListenerTableMap::COL_MESSAGE_TRANSLATION_ID, $messageTranslationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($messageTranslationId['max'])) {
                $this->addUsingAlias(LifeEventListenerTableMap::COL_MESSAGE_TRANSLATION_ID, $messageTranslationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LifeEventListenerTableMap::COL_MESSAGE_TRANSLATION_ID, $messageTranslationId, $comparison);
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
     * @return $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(LifeEventListenerTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(LifeEventListenerTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LifeEventListenerTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(LifeEventListenerTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(LifeEventListenerTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LifeEventListenerTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Model\Custom\NovumOverheid\LifeEvent object
     *
     * @param \Model\Custom\NovumOverheid\LifeEvent|ObjectCollection $lifeEvent The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function filterByLifeEvent($lifeEvent, $comparison = null)
    {
        if ($lifeEvent instanceof \Model\Custom\NovumOverheid\LifeEvent) {
            return $this
                ->addUsingAlias(LifeEventListenerTableMap::COL_LIFE_EVENT_ID, $lifeEvent->getId(), $comparison);
        } elseif ($lifeEvent instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LifeEventListenerTableMap::COL_LIFE_EVENT_ID, $lifeEvent->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByLifeEvent() only accepts arguments of type \Model\Custom\NovumOverheid\LifeEvent or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LifeEvent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function joinLifeEvent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LifeEvent');

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
            $this->addJoinObject($join, 'LifeEvent');
        }

        return $this;
    }

    /**
     * Use the LifeEvent relation LifeEvent object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumOverheid\LifeEventQuery A secondary query class using the current class as primary query
     */
    public function useLifeEventQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLifeEvent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LifeEvent', '\Model\Custom\NovumOverheid\LifeEventQuery');
    }

    /**
     * Filter the query by a related \Model\System\DataSourceEndpoint object
     *
     * @param \Model\System\DataSourceEndpoint|ObjectCollection $dataSourceEndpoint The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function filterByDataSourceEndpoint($dataSourceEndpoint, $comparison = null)
    {
        if ($dataSourceEndpoint instanceof \Model\System\DataSourceEndpoint) {
            return $this
                ->addUsingAlias(LifeEventListenerTableMap::COL_DATASOURCE_ENDPOINT_ID, $dataSourceEndpoint->getId(), $comparison);
        } elseif ($dataSourceEndpoint instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LifeEventListenerTableMap::COL_DATASOURCE_ENDPOINT_ID, $dataSourceEndpoint->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDataSourceEndpoint() only accepts arguments of type \Model\System\DataSourceEndpoint or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DataSourceEndpoint relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function joinDataSourceEndpoint($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DataSourceEndpoint');

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
            $this->addJoinObject($join, 'DataSourceEndpoint');
        }

        return $this;
    }

    /**
     * Use the DataSourceEndpoint relation DataSourceEndpoint object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\System\DataSourceEndpointQuery A secondary query class using the current class as primary query
     */
    public function useDataSourceEndpointQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDataSourceEndpoint($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DataSourceEndpoint', '\Model\System\DataSourceEndpointQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumOverheid\MessageTranslation object
     *
     * @param \Model\Custom\NovumOverheid\MessageTranslation|ObjectCollection $messageTranslation The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function filterByMessageTranslation($messageTranslation, $comparison = null)
    {
        if ($messageTranslation instanceof \Model\Custom\NovumOverheid\MessageTranslation) {
            return $this
                ->addUsingAlias(LifeEventListenerTableMap::COL_MESSAGE_TRANSLATION_ID, $messageTranslation->getId(), $comparison);
        } elseif ($messageTranslation instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LifeEventListenerTableMap::COL_MESSAGE_TRANSLATION_ID, $messageTranslation->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMessageTranslation() only accepts arguments of type \Model\Custom\NovumOverheid\MessageTranslation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MessageTranslation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function joinMessageTranslation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MessageTranslation');

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
            $this->addJoinObject($join, 'MessageTranslation');
        }

        return $this;
    }

    /**
     * Use the MessageTranslation relation MessageTranslation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumOverheid\MessageTranslationQuery A secondary query class using the current class as primary query
     */
    public function useMessageTranslationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMessageTranslation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MessageTranslation', '\Model\Custom\NovumOverheid\MessageTranslationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLifeEventListener $lifeEventListener Object to remove from the list of results
     *
     * @return $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function prune($lifeEventListener = null)
    {
        if ($lifeEventListener) {
            $this->addUsingAlias(LifeEventListenerTableMap::COL_ID, $lifeEventListener->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the life_event_listener table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LifeEventListenerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LifeEventListenerTableMap::clearInstancePool();
            LifeEventListenerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LifeEventListenerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LifeEventListenerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LifeEventListenerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LifeEventListenerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(LifeEventListenerTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(LifeEventListenerTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(LifeEventListenerTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(LifeEventListenerTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(LifeEventListenerTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildLifeEventListenerQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(LifeEventListenerTableMap::COL_CREATED_AT);
    }

} // LifeEventListenerQuery
