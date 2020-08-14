<?php

namespace Model\Custom\NovumOverheid\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumOverheid\Databron as ChildDatabron;
use Model\Custom\NovumOverheid\DatabronQuery as ChildDatabronQuery;
use Model\Custom\NovumOverheid\Map\DatabronTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'databron' table.
 *
 *
 *
 * @method     ChildDatabronQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDatabronQuery orderByTitel($order = Criteria::ASC) Order by the titel column
 * @method     ChildDatabronQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildDatabronQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildDatabronQuery orderByDocumentation($order = Criteria::ASC) Order by the documentation column
 *
 * @method     ChildDatabronQuery groupById() Group by the id column
 * @method     ChildDatabronQuery groupByTitel() Group by the titel column
 * @method     ChildDatabronQuery groupByCode() Group by the code column
 * @method     ChildDatabronQuery groupByUrl() Group by the url column
 * @method     ChildDatabronQuery groupByDocumentation() Group by the documentation column
 *
 * @method     ChildDatabronQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDatabronQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDatabronQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDatabronQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDatabronQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDatabronQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDatabron findOne(ConnectionInterface $con = null) Return the first ChildDatabron matching the query
 * @method     ChildDatabron findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDatabron matching the query, or a new ChildDatabron object populated from the query conditions when no match is found
 *
 * @method     ChildDatabron findOneById(int $id) Return the first ChildDatabron filtered by the id column
 * @method     ChildDatabron findOneByTitel(string $titel) Return the first ChildDatabron filtered by the titel column
 * @method     ChildDatabron findOneByCode(string $code) Return the first ChildDatabron filtered by the code column
 * @method     ChildDatabron findOneByUrl(string $url) Return the first ChildDatabron filtered by the url column
 * @method     ChildDatabron findOneByDocumentation(string $documentation) Return the first ChildDatabron filtered by the documentation column *

 * @method     ChildDatabron requirePk($key, ConnectionInterface $con = null) Return the ChildDatabron by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDatabron requireOne(ConnectionInterface $con = null) Return the first ChildDatabron matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDatabron requireOneById(int $id) Return the first ChildDatabron filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDatabron requireOneByTitel(string $titel) Return the first ChildDatabron filtered by the titel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDatabron requireOneByCode(string $code) Return the first ChildDatabron filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDatabron requireOneByUrl(string $url) Return the first ChildDatabron filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDatabron requireOneByDocumentation(string $documentation) Return the first ChildDatabron filtered by the documentation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDatabron[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDatabron objects based on current ModelCriteria
 * @method     ChildDatabron[]|ObjectCollection findById(int $id) Return ChildDatabron objects filtered by the id column
 * @method     ChildDatabron[]|ObjectCollection findByTitel(string $titel) Return ChildDatabron objects filtered by the titel column
 * @method     ChildDatabron[]|ObjectCollection findByCode(string $code) Return ChildDatabron objects filtered by the code column
 * @method     ChildDatabron[]|ObjectCollection findByUrl(string $url) Return ChildDatabron objects filtered by the url column
 * @method     ChildDatabron[]|ObjectCollection findByDocumentation(string $documentation) Return ChildDatabron objects filtered by the documentation column
 * @method     ChildDatabron[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DatabronQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumOverheid\Base\DatabronQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumOverheid\\Databron', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDatabronQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDatabronQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDatabronQuery) {
            return $criteria;
        }
        $query = new ChildDatabronQuery();
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
     * @return ChildDatabron|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DatabronTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DatabronTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDatabron A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, titel, code, url, documentation FROM databron WHERE id = :p0';
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
            /** @var ChildDatabron $obj */
            $obj = new ChildDatabron();
            $obj->hydrate($row);
            DatabronTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDatabron|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDatabronQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DatabronTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDatabronQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DatabronTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildDatabronQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DatabronTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DatabronTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatabronTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the titel column
     *
     * Example usage:
     * <code>
     * $query->filterByTitel('fooValue');   // WHERE titel = 'fooValue'
     * $query->filterByTitel('%fooValue%', Criteria::LIKE); // WHERE titel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $titel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDatabronQuery The current query, for fluid interface
     */
    public function filterByTitel($titel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($titel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatabronTableMap::COL_TITEL, $titel, $comparison);
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
     * @return $this|ChildDatabronQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatabronTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%', Criteria::LIKE); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDatabronQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatabronTableMap::COL_URL, $url, $comparison);
    }

    /**
     * Filter the query on the documentation column
     *
     * Example usage:
     * <code>
     * $query->filterByDocumentation('fooValue');   // WHERE documentation = 'fooValue'
     * $query->filterByDocumentation('%fooValue%', Criteria::LIKE); // WHERE documentation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $documentation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDatabronQuery The current query, for fluid interface
     */
    public function filterByDocumentation($documentation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($documentation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatabronTableMap::COL_DOCUMENTATION, $documentation, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDatabron $databron Object to remove from the list of results
     *
     * @return $this|ChildDatabronQuery The current query, for fluid interface
     */
    public function prune($databron = null)
    {
        if ($databron) {
            $this->addUsingAlias(DatabronTableMap::COL_ID, $databron->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the databron table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DatabronTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DatabronTableMap::clearInstancePool();
            DatabronTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DatabronTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DatabronTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DatabronTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DatabronTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DatabronQuery
