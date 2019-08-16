import Head from "next/head";
import styles from "./index.scss";
import Link from "next/link";

function Home() {
  return (
    <>
      <Head>
        <title>Welcome</title>
      </Head>
      <div className={styles.example}>Welcome to Datahjelpen!</div>
      <Link href="/about">
        <a>About Us</a>
      </Link>
    </>
  );
}

export default Home;
