# Description

This repository is a beginner-friendly project aimed at creating a PHP API based on GraphQL. It serves as a skeleton for anyone looking to start building a GraphQL API backed by a MySQL database. It includes simple queries to get unit types by their ID or to fetch all of them, while also demonstrating how to add more complex functionalities.

The initial API includes a basic query:

```graphql
type Query {
  hello: String
  unitTypeById(id: String!): UnitType
  unitTypes: [UnitType]!
}
```

As a beginner, I worked hard to enhance this API with the following functionalities:

- Query collaborators available in the system.
- Query a specific collaborator by their `id`.
- Add a mutation to create a new unit type by supplying a name.

I am happy to say that, through effort and careful study of the available documentation, I was able to implement these functionalities successfully.

# Getting Started

To get started, you can run the solution easily with Docker and Docker Compose.

```bash
docker-compose up
```

This command will create the database and populate it with some sample data. Once it's up and running, you can open Apollo Studio to test the API at [http://localhost:3003/](http://localhost:3003/).

# Enhancements Made

The original assignment required enhancing the existing GraphQL API by adding the following features:

1. **Collaborator Queries**: 
   - Added the ability to query all collaborators in the system.
   - Added the ability to query a specific collaborator by their `id`.
2. **Unit Type Mutation**:
   - Enhanced the existing API to create a new unit type by providing a name through a GraphQL mutation.

Here is the updated GraphQL schema after these changes:

```graphql
type Collaborator {
   id: ID!
   name: String!
   firstName: String!
}

type Query {
   collaborators: [Collaborator!]!
   collaboratorById(id: ID!): Collaborator!
}

input UnitTypeCreateInput {
   name: String!
}

type Mutation {
   unitTypeCreate(input: UnitTypeCreateInput!): UnitType!
}
```

# Challenges and Learnings

As someone who is still learning, this project presented many challenges that pushed me beyond my comfort zone. Understanding the structure of GraphQL and its underlying principles was challenging, but incredibly rewarding. Through careful reading of documentation, trial and error, and lots of patience, I managed to implement all the required features.

The key learnings from this exercise include:

- **GraphQL Fundamentals**: Understanding how queries and mutations are designed and how they interact with the underlying data model.
- **Data Validation**: Ensuring the integrity of data, especially when adding new entries, was an important lesson.
- **Error Handling**: Handling errors gracefully and providing informative feedback was crucial, and something I learned to appreciate more during this project.
- **Promises in PHP**: Using promises was a new concept to me, and I had to understand how asynchronous operations work in a PHP backend context.

# Conclusion

I learned a lot from this experience, from GraphQL basics to structuring backend code effectively. It was a journey filled with setbacks, but those setbacks helped me grow as a developer. I hope this project can serve as a foundation for others who are also new to GraphQL and want to dive into backend development.

The completed functionality now includes:
- Queries for collaborators and their details.
- Creation of new unit types via mutation.

I look forward to learning more and continuing to refine my skills.

# Running the Solution

To run the solution:
1. Clone the repository.
2. Make sure Docker is installed.
3. Run the following command to start the services:

```bash
docker-compose up
```

This will create a MySQL database and a GraphQL API ready for testing.

Good luck exploring, and I hope this helps others on their learning journey just as it did for me!
